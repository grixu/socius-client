<?php

namespace Grixu\SociusClient\Abstracts;

use Grixu\ApiClient\JsonApiFetcher;
use Grixu\SociusClient\SociusClient;
use Grixu\Synchronizer\Process\Contracts\LoaderInterface;
use Illuminate\Support\Collection;

abstract class ApiLoader implements LoaderInterface
{
    protected int $count = 0;
    protected JsonApiFetcher $query;
    protected Collection $data;

    public function __construct($module)
    {
        $sc = new SociusClient();
        /** @var JsonApiFetcher $dataFetcher */
        $this->query = $sc->$module();

        $this->data = collect();
    }


    public function buildQuery(?array $foreignKeys = []): static
    {
        if (!empty($foreignKeys)) {
            $this->query->compose()->addFilter('xl_id', ...$foreignKeys);
        }

        return $this;
    }

    public function getCount(): int
    {
        $this->checkIsDataLoaded();

        return $this->count;
    }

    protected function checkIsDataLoaded(): void
    {
        if ($this->count <= 0 && $this->data->count() <= 0) {
            $this->query->fetch();
            $this->data = $this->query->getDataCollection()->flatten(1);
            $this->count = $this->data->count();
        }
    }

    public function chunk(\Closure $loop): void
    {
        $this->query->chunk($loop);
    }

    public function get(): Collection
    {
        $this->checkIsDataLoaded();

        return $this->data->chunk(config('synchronizer.sync.default_chunk_size'));
    }

    public function getRaw(): Collection
    {
        $this->checkIsDataLoaded();

        return $this->data;
    }

    public function getBuilder(): JsonApiFetcher
    {
        return $this->query;
    }
}

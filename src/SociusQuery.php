<?php

namespace Grixu\SociusClient;

use Grixu\ApiClient\ApiClient;
use Grixu\ApiClient\CallApi;
use Grixu\SociusClient\Query\Actions\AddFilterAction;
use Grixu\SociusClient\Query\Actions\AddIncludeAction;
use Grixu\SociusClient\Query\Actions\AddSortAction;
use Grixu\SociusClient\Query\Actions\MakeResultDataAction;
use Grixu\SociusClient\Query\Actions\PrepareQueryAction;
use Grixu\SociusClient\Query\DataTransferObjects\FilterDataCollection;
use Grixu\SociusClient\Query\DataTransferObjects\RequestQueryData;
use Grixu\SociusClient\Query\DataTransferObjects\ResultData;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\DataTransferObjectCollection;

class SociusQuery
{
    protected SociusDomainEnum $domain;
    protected ?string $domainFiltersEnum;
    protected ?string $domainIncludesEnum;
    protected ?string $domainSortsEnum;

    protected Collection $allowedFilters;
    protected Collection $allowedSorts;
    protected Collection $allowedIncludes;
    protected Collection $allowedParsers;

    protected RequestQueryData $query;

    protected AddFilterAction $addFilterAction;
    protected AddIncludeAction $addIncludeAction;
    protected AddSortAction $addSortAction;
    protected PrepareQueryAction $prepareQueryAction;
    protected MakeResultDataAction $makeResultDataAction;

    protected CallApi $apiClient;
    protected string $baseUrl;
    protected $parser;

    protected ?ResultData $rawResults;
    protected DataTransferObjectCollection $results;

    public function __construct(SociusDomainEnum $domain)
    {
        $this->addFilterAction = new AddFilterAction();
        $this->addIncludeAction = new AddIncludeAction();
        $this->addSortAction = new AddSortAction();
        $this->prepareQueryAction = new PrepareQueryAction();
        $this->makeResultDataAction = new MakeResultDataAction();
        $this->apiClient = ApiClient::make('socius-client.api');

        $this->domain = $domain;
        $this->query = new RequestQueryData([]);

        $this->fillAllowed();
        $this->setBaseUrl();
        $this->setDomainEnums();
        $this->createParser();
    }


    protected function fillAllowed(): void
    {
        $this->allowedFilters = collect(config('socius-client.allowed_filters'));
        $this->allowedSorts = collect(config('socius-client.allowed_sorts'));
        $this->allowedIncludes = collect(config('socius-client.allowed_includes'));
        $this->allowedParsers = collect(config('socius-client.allowed_parsers'));
    }

    protected function setBaseUrl(): void
    {
        $this->baseUrl = config('socius-client.modules.' . strtolower($this->domain->value));
    }

    protected function setDomainEnums(): void
    {
        $base = str_replace("_", "", ucwords(strtolower($this->domain->value), "_"));

        $this->domainFiltersEnum = $this->allowedFilters->filter(
            function ($item) use ($base) {
                return strpos($item, $base . 'FiltersEnum') !== false;
            }
        )->first();

        $this->domainSortsEnum = $this->allowedSorts->filter(
            function ($item) use ($base) {
                return strpos($item, $base . 'SortsEnum') !== false;
            }
        )->first();

        $this->domainIncludesEnum = $this->allowedIncludes->filter(
            function ($item) use ($base) {
                return strpos($item, $base . 'IncludesEnum') !== false;
            }
        )->first();
    }

    protected function createParser(): void
    {
        $classNamePre = 'ConvertTo' . str_replace(
                "_",
                "",
                ucwords(strtolower($this->domain->value), "_")
            ) . 'DataAction';

        $className = $this->allowedParsers->filter(
            function ($item) use ($classNamePre) {
                return strpos($item, $classNamePre) !== false;
            }
        )->first();

        $this->parser = new $className();
    }

    public function loadParamsFromRequest(SociusRequest $request): self
    {
        if (!empty($request->validated()['filters'])) {
            $filterDataCollection = FilterDataCollection::create($request->validated()['filters']);
            $this->addFilterAction->execute($filterDataCollection, $this->query, $this->domainFiltersEnum);
        }

        if (!empty($request->validated()['sorts'])) {
            $this->addSortAction->execute($request->validated()['sorts'], $this->query, $this->domainSortsEnum);
        }

        if (!empty($request->validated()['includes'])) {
            $this->addIncludeAction->execute(
                $request->validated()['includes'],
                $this->query,
                $this->domainIncludesEnum
            );
        }

        return $this;
    }

    public function addFilter(string $filterName, ...$filterValues): self
    {
        $filterDataCollection = FilterDataCollection::create(
            [
                [
                    'field' => $filterName,
                    'values' => $filterValues,
                ]
            ]
        );

        $this->addFilterAction->execute($filterDataCollection, $this->query, $this->domainFiltersEnum);

        return $this;
    }

    public function addSort(string $sort): self
    {
        $this->addSortAction->execute([$sort], $this->query, $this->domainSortsEnum);

        return $this;
    }

    public function addInclude(string $include): self
    {
        $this->addIncludeAction->execute([$include], $this->query, $this->domainIncludesEnum);

        return $this;
    }

    public function fetch(int $page = null): self
    {
        // Make first (or only in when $page is not null) API Call
        $results = $this->apiClient->call(
            $this->getUrl($page)
        );
        $this->rawResults = $this->makeResultDataAction->execute($results);

        if ($page === null) {
            for ($i = $this->rawResults->currentPage + 1; $i <= $this->rawResults->lastPage; $i++) {
                // regenerate URL, now with next page in QueryString
                $this->query->page = $i;
                $finalUrl = $this->baseUrl . $this->prepareQueryAction->execute($this->query);

                // Call Api
                $results = $this->apiClient->call($finalUrl);
                // Transform API Call result to ResultData (DTO)
                $results = $this->makeResultDataAction->execute($results);

                // Combine results with already taken data
                $this->mergeResults($results);
            }
        }

        // Finally parse objects
        if (!empty($this->rawResults)) {
            $this->results = $this->parser->execute($this->rawResults->data);
        }

        return $this;
    }

    public function getUrl(int $page = null): string
    {
        // If page param is set then add it to QueryString, otherwise do not
        if ($page !== null) {
            $this->query->page = $page;
        }

        return $this->baseUrl . $this->prepareQueryAction->execute($this->query);
    }

    protected function mergeResults(ResultData $data): void
    {
        $completeDataSet = array_merge($this->rawResults->data, $data->data);

        $this->rawResults->to = $data->to;
        $this->rawResults->currentPage = $data->currentPage;
        $this->rawResults->data = $completeDataSet;
        $this->rawResults->nextPageUrl = $data->nextPageUrl;
    }

    public function getResults(): DataTransferObjectCollection
    {
        return $this->results;
    }
}

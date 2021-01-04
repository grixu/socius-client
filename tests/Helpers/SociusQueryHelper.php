<?php

namespace Grixu\SociusClient\Tests\Helpers;

use Grixu\ApiClient\CallApi;
use Grixu\SociusClient\SociusDomainEnum;
use Grixu\SociusClient\SociusQuery;
use Grixu\SociusClient\Query\Actions\AddFilterAction;
use Grixu\SociusClient\Query\Actions\AddIncludeAction;
use Grixu\SociusClient\Query\Actions\AddSortAction;
use Grixu\SociusClient\Query\Actions\MakeResultDataAction;
use Grixu\SociusClient\Query\Actions\PrepareQueryAction;
use Grixu\SociusClient\Query\DataTransferObjects\RequestQueryData;
use Grixu\SociusClient\Query\DataTransferObjects\ResultData;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\DataTransferObjectCollection;

class SociusQueryHelper extends SociusQuery
{
    public function getDomain(): SociusDomainEnum
    {
        return $this->domain;
    }

    public function getDomainFiltersEnum(): string
    {
        return $this->domainFiltersEnum;
    }

    public function getDomainIncludesEnum(): string
    {
        return $this->domainIncludesEnum;
    }

    public function getDomainSortsEnum(): string
    {
        return $this->domainSortsEnum;
    }

    public function getRawResults(): ?ResultData
    {
        return $this->rawResults;
    }

    public function getResults(): DataTransferObjectCollection
    {
        return $this->results;
    }

    public function getQuery(): RequestQueryData
    {
        return $this->query;
    }

    public function getAddFilterAction(): AddFilterAction
    {
        return $this->addFilterAction;
    }

    public function getAddIncludeAction(): AddIncludeAction
    {
        return $this->addIncludeAction;
    }

    public function getAddSortAction(): AddSortAction
    {
        return $this->addSortAction;
    }

    public function getPrepareQueryAction(): PrepareQueryAction
    {
        return $this->prepareQueryAction;
    }

    public function getApiClient(): CallApi
    {
        return $this->apiClient;
    }

    public function getMakeResultDataAction(): MakeResultDataAction
    {
        return $this->makeResultDataAction;
    }

    public function getParser()
    {
        return $this->parser;
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function getAllowedFilters(): Collection
    {
        return $this->allowedFilters;
    }

    public function getAllowedSorts(): Collection
    {
        return $this->allowedSorts;
    }

    public function getAllowedIncludes(): Collection
    {
        return $this->allowedIncludes;
    }

    public function getAllowedParsers(): Collection
    {
        return $this->allowedParsers;
    }
}

<?php

namespace Grixu\SociusClient\Tests\Helpers;

use Grixu\SociusClient\SociusDomainEnum;
use Grixu\SociusClient\SociusQuery;
use Grixu\SociusClient\Query\Actions\AddFilterAction;
use Grixu\SociusClient\Query\Actions\AddIncludeAction;
use Grixu\SociusClient\Query\Actions\AddSortAction;
use Grixu\SociusClient\Query\Actions\CallApiAction;
use Grixu\SociusClient\Query\Actions\MakeResultDataAction;
use Grixu\SociusClient\Query\Actions\PrepareQueryAction;
use Grixu\SociusClient\Query\DataTransferObjects\RequestQueryData;
use Grixu\SociusClient\Query\DataTransferObjects\ResultData;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Class SociusQueryHelper
 * @package Grixu\SociusClient\Tests\Helpers
 */
class SociusQueryHelper extends SociusQuery
{
    /**
     * @return SociusDomainEnum
     */
    public function getDomain(): SociusDomainEnum
    {
        return $this->domain;
    }

    /**
     * @return string
     */
    public function getDomainFiltersEnum(): string
    {
        return $this->domainFiltersEnum;
    }

    /**
     * @return string
     */
    public function getDomainIncludesEnum(): string
    {
        return $this->domainIncludesEnum;
    }

    /**
     * @return string
     */
    public function getDomainSortsEnum(): string
    {
        return $this->domainSortsEnum;
    }

    /**
     * @return ResultData|null
     */
    public function getRawResults(): ?ResultData
    {
        return $this->rawResults;
    }

    /**
     * @return DataTransferObjectCollection
     */
    public function getResults(): DataTransferObjectCollection
    {
        return $this->results;
    }

    /**
     * @return RequestQueryData
     */
    public function getQuery(): RequestQueryData
    {
        return $this->query;
    }

    /**
     * @return AddFilterAction
     */
    public function getAddFilterAction(): AddFilterAction
    {
        return $this->addFilterAction;
    }

    /**
     * @return AddIncludeAction
     */
    public function getAddIncludeAction(): AddIncludeAction
    {
        return $this->addIncludeAction;
    }

    /**
     * @return AddSortAction
     */
    public function getAddSortAction(): AddSortAction
    {
        return $this->addSortAction;
    }

    /**
     * @return PrepareQueryAction
     */
    public function getPrepareQueryAction(): PrepareQueryAction
    {
        return $this->prepareQueryAction;
    }

    /**
     * @return CallApiAction
     */
    public function getCallApiAction(): CallApiAction
    {
        return $this->callApiAction;
    }

    /**
     * @return MakeResultDataAction
     */
    public function getMakeResultDataAction(): MakeResultDataAction
    {
        return $this->makeResultDataAction;
    }

    /**
     * @return mixed
     */
    public function getParser()
    {
        return $this->parser;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @return Collection
     */
    public function getAllowedFilters(): Collection
    {
        return $this->allowedFilters;
    }

    /**
     * @return Collection
     */
    public function getAllowedSorts(): Collection
    {
        return $this->allowedSorts;
    }

    /**
     * @return Collection
     */
    public function getAllowedIncludes(): Collection
    {
        return $this->allowedIncludes;
    }

    /**
     * @return Collection
     */
    public function getAllowedParsers(): Collection
    {
        return $this->allowedParsers;
    }
}

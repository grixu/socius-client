<?php

namespace Grixu\SociusClient;

use Grixu\SociusClient\Customer\Actions\ConvertToCustomerDataAction;
use Grixu\SociusClient\Customer\Enums\CustomerFiltersEnum;
use Grixu\SociusClient\Customer\Enums\CustomerIncludesEnum;
use Grixu\SociusClient\Customer\Enums\CustomerSortsEnum;
use Grixu\SociusClient\Description\Actions\ConvertToDescriptionDataAction;
use Grixu\SociusClient\Description\Actions\ConvertToLanguageDataAction;
use Grixu\SociusClient\Description\Enums\DescriptionFiltersEnum;
use Grixu\SociusClient\Description\Enums\DescriptionIncludesEnum;
use Grixu\SociusClient\Description\Enums\DescriptionSortsEnum;
use Grixu\SociusClient\Description\Enums\LanguageFiltersEnum;
use Grixu\SociusClient\Description\Enums\LanguageSortsEnum;
use Grixu\SociusClient\Operator\Actions\ConvertToBranchDataAction;
use Grixu\SociusClient\Operator\Actions\ConvertToOperatorDataAction;
use Grixu\SociusClient\Operator\Actions\ConvertToOperatorRoleDataAction;
use Grixu\SociusClient\Operator\Enums\BranchFiltersEnum;
use Grixu\SociusClient\Operator\Enums\BranchSortsEnum;
use Grixu\SociusClient\Operator\Enums\OperatorFiltersEnum;
use Grixu\SociusClient\Operator\Enums\OperatorIncludesEnum;
use Grixu\SociusClient\Operator\Enums\OperatorRoleFiltersEnum;
use Grixu\SociusClient\Operator\Enums\OperatorRoleIncludesEnum;
use Grixu\SociusClient\Operator\Enums\OperatorRoleSortsEnum;
use Grixu\SociusClient\Operator\Enums\OperatorSortsEnum;
use Grixu\SociusClient\Product\Actions\ConvertToBrandDataAction;
use Grixu\SociusClient\Product\Actions\ConvertToCategoryDataAction;
use Grixu\SociusClient\Product\Actions\ConvertToProductDataAction;
use Grixu\SociusClient\Product\Actions\ConvertToProductTypeDataAction;
use Grixu\SociusClient\Product\Enums\BrandFilterEnum;
use Grixu\SociusClient\Product\Enums\BrandIncludesEnum;
use Grixu\SociusClient\Product\Enums\BrandSortsEnum;
use Grixu\SociusClient\Product\Enums\CategoryFilterEnum;
use Grixu\SociusClient\Product\Enums\CategoryIncludesEnum;
use Grixu\SociusClient\Product\Enums\CategorySortsEnum;
use Grixu\SociusClient\Product\Enums\ProductFiltersEnum;
use Grixu\SociusClient\Product\Enums\ProductIncludesEnum;
use Grixu\SociusClient\Product\Enums\ProductSortsEnum;
use Grixu\SociusClient\Product\Enums\ProductTypeFiltersEnum;
use Grixu\SociusClient\Product\Enums\ProductTypeIncludesEnum;
use Grixu\SociusClient\Product\Enums\ProductTypeSortsEnum;
use Grixu\SociusClient\Query\Actions\AddFilterAction;
use Grixu\SociusClient\Query\Actions\AddIncludeAction;
use Grixu\SociusClient\Query\Actions\AddSortAction;
use Grixu\SociusClient\Query\Actions\CallApiAction;
use Grixu\SociusClient\Query\Actions\MakeResultDataAction;
use Grixu\SociusClient\Query\Actions\PrepareQueryAction;
use Grixu\SociusClient\Query\DataTransferObjects\FilterDataCollection;
use Grixu\SociusClient\Query\DataTransferObjects\RequestQueryData;
use Grixu\SociusClient\Query\DataTransferObjects\ResultData;
use Grixu\SociusClient\Warehouse\Actions\ConvertToStockDataAction;
use Grixu\SociusClient\Warehouse\Actions\ConvertToWarehouseDataAction;
use Grixu\SociusClient\Warehouse\Enums\StockFiltersEnum;
use Grixu\SociusClient\Warehouse\Enums\StockIncludesEnum;
use Grixu\SociusClient\Warehouse\Enums\StockSortsEnum;
use Grixu\SociusClient\Warehouse\Enums\WarehouseFiltersEnum;
use Grixu\SociusClient\Warehouse\Enums\WarehouseIncludesEnum;
use Grixu\SociusClient\Warehouse\Enums\WarehouseSortsEnum;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\DataTransferObjectCollection;


/**
 * Class SociusQuery
 * @package App\Socius
 */
class SociusQuery
{
    protected SociusDomainEnum $domain;
    protected string $domainFiltersEnum;
    protected string $domainIncludesEnum;
    protected string $domainSortsEnum;

    protected ?ResultData $rawResults;
    protected DataTransferObjectCollection $results;
    protected RequestQueryData $query;

    protected AddFilterAction $addFilterAction;
    protected AddIncludeAction $addIncludeAction;
    protected AddSortAction $addSortAction;
    protected PrepareQueryAction $prepareQueryAction;
    protected CallApiAction $callApiAction;
    protected MakeResultDataAction $makeResultDataAction;
    protected $parser;

    protected string $baseUrl;
    protected Collection $allowedFilters;
    protected Collection $allowedSorts;
    protected Collection $allowedIncludes;
    protected Collection $allowedParsers;

    /**
     * SociusQuery constructor.
     * @param SociusDomainEnum $domain
     */
    public function __construct(SociusDomainEnum $domain)
    {
        $this->addFilterAction = new AddFilterAction();
        $this->addIncludeAction = new AddIncludeAction();
        $this->addSortAction = new AddSortAction();
        $this->prepareQueryAction = new PrepareQueryAction();
        $this->callApiAction = new CallApiAction();
        $this->makeResultDataAction = new MakeResultDataAction();

        $this->domain = $domain;
        $this->query = new RequestQueryData([]);

        $this->fillAllowed();
        $this->setBaseUrl();
        $this->setDomainEnums();
        $this->createParser();
    }

    /**
     * Filling allowed filters, sorts and Includes with class names
     * It's required for selecting only allowed enum classes from
     * each domain for passing proper enum class name into checking
     * action before adding new filter, sort or include
     */
    protected function fillAllowed(): void
    {
        $this->allowedFilters = collect(
            [
                ProductTypeFiltersEnum::class,
                ProductFiltersEnum::class,
                BrandFilterEnum::class,
                CategoryFilterEnum::class,
                CustomerFiltersEnum::class,
                DescriptionFiltersEnum::class,
                LanguageFiltersEnum::class,
                OperatorFiltersEnum::class,
                OperatorRoleFiltersEnum::class,
                BranchFiltersEnum::class,
                WarehouseFiltersEnum::class,
                StockFiltersEnum::class
            ]
        );

        $this->allowedSorts = collect(
            [
                ProductTypeSortsEnum::class,
                ProductSortsEnum::class,
                BrandSortsEnum::class,
                CategorySortsEnum::class,
                CustomerSortsEnum::class,
                DescriptionSortsEnum::class,
                LanguageSortsEnum::class,
                OperatorSortsEnum::class,
                OperatorRoleSortsEnum::class,
                BranchSortsEnum::class,
                WarehouseSortsEnum::class,
                StockSortsEnum::class
            ]
        );

        $this->allowedIncludes = collect(
            [
                ProductTypeIncludesEnum::class,
                ProductIncludesEnum::class,
                BrandIncludesEnum::class,
                CategoryIncludesEnum::class,
                CustomerIncludesEnum::class,
                DescriptionIncludesEnum::class,
                OperatorIncludesEnum::class,
                OperatorRoleIncludesEnum::class,
                BranchSortsEnum::class,
                WarehouseIncludesEnum::class,
                StockIncludesEnum::class
            ]
        );

        $this->allowedParsers = collect(
            [
                ConvertToProductTypeDataAction::class,
                ConvertToProductDataAction::class,
                ConvertToBrandDataAction::class,
                ConvertToCategoryDataAction::class,
                ConvertToCustomerDataAction::class,
                ConvertToDescriptionDataAction::class,
                ConvertToLanguageDataAction::class,
                ConvertToOperatorDataAction::class,
                ConvertToOperatorRoleDataAction::class,
                ConvertToBranchDataAction::class,
                ConvertToWarehouseDataAction::class,
                ConvertToStockDataAction::class
            ]
        );
    }

    /**
     * Sets filter, include and sort enum class for selected domain
     */
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

    /**
     * Set base url for selected domain
     */
    protected function setBaseUrl(): void
    {
        $this->baseUrl = config('socius-client.base_url') . config(
                'socius-client.modules.' . strtolower($this->domain->value)
            );
    }

    /**
     * Merge results from new ResultData with already had
     *
     * @param ResultData $data
     */
    protected function mergeResults(ResultData $data): void
    {
        $completeDataSet = array_merge($this->rawResults->data, $data->data);

        $this->rawResults->to = $data->to;
        $this->rawResults->currentPage = $data->currentPage;
        $this->rawResults->data = $completeDataSet;
        $this->rawResults->nextPageUrl = $data->nextPageUrl;
    }

    /**
     * Creates parser class based on domain
     */
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

    /**
     * Load params: filters, includes and sorts from Request class
     *
     * @param SociusRequest $request
     * @return SociusQuery
     */
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

    /**
     * @param string $filterName
     * @param mixed ...$filterValues
     * @return $this
     */
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

    /**
     * @param string $sort
     * @return $this
     */
    public function addSort(string $sort): self
    {
        $this->addSortAction->execute([$sort], $this->query, $this->domainSortsEnum);

        return $this;
    }

    /**
     * @param string $include
     * @return $this
     */
    public function addInclude(string $include): self
    {
        $this->addIncludeAction->execute([$include], $this->query, $this->domainIncludesEnum);

        return $this;
    }

    /**
     * @param int|null $page
     * @return $this
     * @throws \Grixu\SociusClient\Query\Exceptions\ApiCallException
     * @throws \Grixu\SociusClient\Query\Exceptions\TokenIssueException
     */
    public function fetch(int $page = null): self
    {
        // If page param is set then add it to QueryString, otherwise do not
        if ($page !== null) {
            $this->query->page = $page;
        }

        $finalUrl = $this->baseUrl . $this->prepareQueryAction->execute($this->query);

        // Make first (or only in when $page is not null) API Call
        $results = $this->callApiAction->execute($finalUrl);
        $this->rawResults = $this->makeResultDataAction->execute($results);

        if ($page === null) {
            for ($i = $this->rawResults->currentPage + 1; $i <= $this->rawResults->lastPage; $i++) {
                // regenerate URL, now with next page in QueryString
                $this->query->page = $i;
                $finalUrl = $this->baseUrl . $this->prepareQueryAction->execute($this->query);

                // Call Api
                $results = $this->callApiAction->execute($finalUrl);
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

    /**
     * @return DataTransferObjectCollection
     */
    public function getResults()
    {
        return $this->results;
    }
}

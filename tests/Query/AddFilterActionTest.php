<?php

namespace Grixu\SociusClient\Tests\Query;

use Grixu\SociusClient\Product\Enums\ProductFiltersEnum;
use Grixu\SociusClient\Query\Actions\AddFilterAction;
use Grixu\SociusClient\Query\DataTransferObjects\FilterDataCollection;
use Grixu\SociusClient\Query\DataTransferObjects\RequestQueryData;
use PHPUnit\Framework\TestCase;
use Grixu\SociusClient\Tests\Factories\Query\RequestQueryDataFactory;

/**
 * Class AddFilterActionTest
 * @package Grixu\SociusClient\Tests\Query
 */
class AddFilterActionTest extends TestCase
{
    private AddFilterAction $action;
    private RequestQueryData $queryData;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new AddFilterAction();

        $this->queryData = RequestQueryDataFactory::new()->create();
    }

    /**
     * Check how action reacts with proper filters
     * Should return bigger array with filters
     *
     * @return void
     * @test
     */
    public function with_proper_filters()
    {
        $arrData = [
            [
                'field' => 'ean',
                'values' => [
                    'SZKLO',
                ],
            ],
            [
                'field' => 'index',
                'values' => [
                    '725',
                ],
            ],
        ];

        $filters = FilterDataCollection::create($arrData);

        $result = $this->action->execute($filters, clone $this->queryData, ProductFiltersEnum::class);

        $this->assertEquals(RequestQueryData::class, get_class($result));
        $this->assertNotSameSize($this->queryData->filters, $result->filters);
    }

    /**
     * Check how action reacts when one of filters is wrong
     * Should return untouched array
     *
     * @return void
     * @test
     */
    public function with_wrong_filters()
    {
        $arrData = [
            [
                'field' => 'name',
                'values' => [
                    'SZKLO',
                ],
            ],
            [
                'field' => 'show',
                'values' => [
                    '725',
                ],
            ],
        ];

        $filters = FilterDataCollection::create($arrData);

        $result = $this->action->execute($filters, clone $this->queryData, ProductFiltersEnum::class);

        $this->assertEquals(RequestQueryData::class, get_class($result));
        $this->assertSameSize($this->queryData->filters, $result->filters);
    }

    /**
     * Check how action reacts with proper but already added filter
     * Should return touched array but with unique records only
     *
     * @return void
     * @test
     */
    public function with_the_same_filters()
    {
        $arrData = [
            [
                'field' => 'name',
                'values' => [
                    'SZKLO',
                ],
            ],
        ];

        $filters = FilterDataCollection::create($arrData);

        $result = $this->action->execute($filters, clone $this->queryData, ProductFiltersEnum::class);

        $this->assertEquals(RequestQueryData::class, get_class($result));
        $this->assertSameSize($this->queryData->filters, $result->filters);
    }

    /**
     * Checking it's possible be added first element at empty RequestQueryData
     *
     * @return void
     * @test
     */
    public function with_empty_query()
    {
        $arrData = [
            [
                'field' => 'name',
                'values' => [
                    'SZKLO',
                ],
            ],
        ];
        $filters = FilterDataCollection::create($arrData);
        $emptyQueryData = new RequestQueryData();

        $result = $this->action->execute($filters, $emptyQueryData, ProductFiltersEnum::class);

        $this->assertEquals(RequestQueryData::class, get_class($result));
        $this->assertSameSize($arrData, $result->filters);
    }
}

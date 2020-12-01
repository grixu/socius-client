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

    /** @test */
    public function normal_pass()
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

    /** @test */
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

    /** @test */
    public function with_identical_filters()
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

    /** @test */
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

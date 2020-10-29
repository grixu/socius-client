<?php

namespace Grixu\SociusClient\Tests\Query;

use Grixu\SociusClient\Product\Enums\ProductFiltersEnum;
use Grixu\SociusClient\Query\Actions\CheckFiltersAction;
use Grixu\SociusClient\Query\DataTransferObjects\FilterDataCollection;
use PHPUnit\Framework\TestCase;

/**
 * Class CheckFiltersActionTest
 * @package Grixu\SociusClient\Tests\Query
 */
class CheckFiltersActionTest extends TestCase
{
    private CheckFiltersAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new CheckFiltersAction();
    }

    /**
     * Test how action will work with all proper filters
     *
     * @return void
     * @test
     */
    public function with_proper_params()
    {
        $arrData = [
            [
                'field' => 'name',
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

        $result = $this->action->execute($filters, ProductFiltersEnum::class);

        $this->assertEquals(true, $result);
    }

    /**
     * Check how action react when one of filter is wrong
     *
     * @return void
     * @test
     */
    public function with_wrong_params()
    {
        $arrData = [
            [
                'field' => 'name',
                'values' => [
                    'SZKLO',
                ],
            ],
            [
                'field' => 'lol',
                'values' => [
                    '725',
                ],
            ],
        ];

        $filters = FilterDataCollection::create($arrData);

        $result = $this->action->execute($filters, ProductFiltersEnum::class);

        $this->assertEquals(false, $result);
    }
}

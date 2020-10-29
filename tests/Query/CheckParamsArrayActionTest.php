<?php

namespace Grixu\SociusClient\Tests\Query;

use Grixu\SociusClient\Product\Enums\ProductFiltersEnum;
use Grixu\SociusClient\Query\Actions\CheckParamArrayAction;
use PHPUnit\Framework\TestCase;

/**
 * Class CheckParamsArrayActionTest
 * @package Grixu\SociusClient\Tests\Query
 */
class CheckParamsArrayActionTest extends TestCase
{
    private CheckParamArrayAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new CheckParamArrayAction();
    }

    /**
     * Test how action will work with all proper filters
     *
     * @return void
     * @test
     */
    public function with_proper_params()
    {
        $arrFilters = ['name', 'ean'];

        $result = $this->action->execute($arrFilters, ProductFiltersEnum::class);

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
        $arrFilters = ['name', 'lol'];

        $result = $this->action->execute($arrFilters, ProductFiltersEnum::class);

        $this->assertEquals(false, $result);
    }
}

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

    /** @test */
    public function normal_pass()
    {
        $arrFilters = ['name', 'ean'];

        $result = $this->action->execute($arrFilters, ProductFiltersEnum::class);

        $this->assertEquals(true, $result);
    }

    /** @test */
    public function with_wrong_params()
    {
        $arrFilters = ['name', 'lol'];

        $result = $this->action->execute($arrFilters, ProductFiltersEnum::class);

        $this->assertEquals(false, $result);
    }
}

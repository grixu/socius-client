<?php

namespace Grixu\SociusClient\Tests\Query;

use Grixu\SociusClient\Product\Enums\ProductSortsEnum;
use Grixu\SociusClient\Query\Actions\AddSortAction;
use Grixu\SociusClient\Query\DataTransferObjects\RequestQueryData;
use PHPUnit\Framework\TestCase;
use Grixu\SociusClient\Tests\Factories\Query\RequestQueryDataFactory;

/**
 * Class AddSortsActionTest
 * @package Grixu\SociusClient\Tests\Query
 */
class AddSortsActionTest extends TestCase
{
    private AddSortAction $action;
    private RequestQueryData $queryData;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new AddSortAction();

        $this->queryData = RequestQueryDataFactory::new()->create();
    }

    /**
     * Check how action reacts with proper sorts
     * Should return bigger array with sorts
     *
     * @return void
     * @test
     */
    public function with_proper_sorts()
    {
        $sorts = ['name', 'price'];

        $result = $this->action->execute($sorts, clone $this->queryData, ProductSortsEnum::class);

        $this->assertEquals(RequestQueryData::class, get_class($result));
        $this->assertNotSameSize($this->queryData->sorts, $result->sorts);
    }

    /**
     * Check how action reacts when one of sorts is wrong
     * Should return untouched array
     *
     * @return void
     * @test
     */
    public function with_wrong_sorts()
    {
        $sorts = ['name', 'show'];

        $result = $this->action->execute($sorts, clone $this->queryData, ProductSortsEnum::class);

        $this->assertEquals(RequestQueryData::class, get_class($result));
        $this->assertSameSize($this->queryData->sorts, $result->sorts);
    }

    /**
     * Check how action reacts with proper but already added filter
     * Should return touched array but with unique records only
     *
     * @return void
     * @test
     */
    public function with_the_same_sorts()
    {
        $sorts = ['index'];

        $result = $this->action->execute($sorts, clone $this->queryData, ProductSortsEnum::class);

        $this->assertEquals(RequestQueryData::class, get_class($result));
        $this->assertSameSize($this->queryData->sorts, $result->sorts);
    }

    /**
     * Checking it's possible be added first element at empty RequestQueryData
     *
     * @return void
     * @test
     */
    public function with_empty_query()
    {
        $sorts = ['index'];
        $emptyQueryData = new RequestQueryData();

        $result = $this->action->execute($sorts, $emptyQueryData, ProductSortsEnum::class);

        $this->assertEquals(RequestQueryData::class, get_class($result));
        $this->assertSameSize($sorts, $result->sorts);
    }
}

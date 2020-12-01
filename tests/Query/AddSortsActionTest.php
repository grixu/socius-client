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

    /** @test */
    public function normal_pass()
    {
        $sorts = ['name', 'price'];

        $result = $this->action->execute($sorts, clone $this->queryData, ProductSortsEnum::class);

        $this->assertEquals(RequestQueryData::class, get_class($result));
        $this->assertNotSameSize($this->queryData->sorts, $result->sorts);
    }

    /** @test */
    public function with_wrong_sorts()
    {
        $sorts = ['name', 'show'];

        $result = $this->action->execute($sorts, clone $this->queryData, ProductSortsEnum::class);

        $this->assertEquals(RequestQueryData::class, get_class($result));
        $this->assertSameSize($this->queryData->sorts, $result->sorts);
    }

    /** @test */
    public function with_identical_sorts()
    {
        $sorts = ['index'];

        $result = $this->action->execute($sorts, clone $this->queryData, ProductSortsEnum::class);

        $this->assertEquals(RequestQueryData::class, get_class($result));
        $this->assertSameSize($this->queryData->sorts, $result->sorts);
    }

    /** @test */
    public function with_empty_query()
    {
        $sorts = ['index'];
        $emptyQueryData = new RequestQueryData();

        $result = $this->action->execute($sorts, $emptyQueryData, ProductSortsEnum::class);

        $this->assertEquals(RequestQueryData::class, get_class($result));
        $this->assertSameSize($sorts, $result->sorts);
    }
}

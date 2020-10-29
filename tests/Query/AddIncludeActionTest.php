<?php

namespace Grixu\SociusClient\Tests\Query;

use Grixu\SociusClient\Product\Enums\ProductIncludesEnum;
use Grixu\SociusClient\Query\Actions\AddIncludeAction;
use Grixu\SociusClient\Query\DataTransferObjects\RequestQueryData;
use PHPUnit\Framework\TestCase;
use Grixu\SociusClient\Tests\Factories\Query\RequestQueryDataFactory;

/**
 * Class AddIncludeActionTest
 * @package Grixu\SociusClient\Tests\Query
 */
class AddIncludeActionTest extends TestCase
{
    private AddIncludeAction $action;
    private RequestQueryData $queryData;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new AddIncludeAction();

        $this->queryData = RequestQueryDataFactory::new()->create();
    }

    /**
     * Check how action reacts with proper filters
     * Should return bigger array with filters
     *
     * @return void
     * @test
     */
    public function with_proper_includes()
    {
        $includes = ['stocks', 'descriptions'];

        $result = $this->action->execute($includes, clone $this->queryData, ProductIncludesEnum::class);

        $this->assertEquals(RequestQueryData::class, get_class($result));
        $this->assertNotSameSize($this->queryData->includes, $result->includes);
    }

    /**
     * Check how action reacts when one of includes is wrong
     * Should return untouched array
     *
     * @return void
     * @test
     */
    public function with_wrong_includes()
    {
        $includes = ['name', 'show'];

        $result = $this->action->execute($includes, clone $this->queryData, ProductIncludesEnum::class);

        $this->assertEquals(RequestQueryData::class, get_class($result));
        $this->assertSameSize($this->queryData->includes, $result->includes);
    }

    /**
     * Check how action reacts with proper but already added filter
     * Should return touched array but with unique records only
     *
     * @return void
     * @test
     */
    public function with_the_same_includes()
    {
        $includes = ['brand'];

        $result = $this->action->execute($includes, clone $this->queryData, ProductIncludesEnum::class);

        $this->assertEquals(RequestQueryData::class, get_class($result));
        $this->assertSameSize($this->queryData->includes, $result->includes);
    }

    /**
     * Checking it's possible be added first element at empty RequestQueryData
     *
     * @return void
     * @test
     */
    public function with_empty_query()
    {
        $includes = ['brand'];
        $emptyQueryData = new RequestQueryData();

        $result = $this->action->execute($includes, $emptyQueryData, ProductIncludesEnum::class);

        $this->assertEquals(RequestQueryData::class, get_class($result));
        $this->assertSameSize($includes, $result->includes);
    }
}

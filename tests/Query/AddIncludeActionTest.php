<?php

namespace Grixu\SociusClient\Tests\Query;

use Grixu\SociusClient\Product\Enums\ProductIncludesEnum;
use Grixu\SociusClient\Query\Actions\AddIncludeAction;
use Grixu\SociusClient\Query\DataTransferObjects\RequestQueryData;
use PHPUnit\Framework\TestCase;
use Grixu\SociusClient\Tests\Factories\Query\RequestQueryDataFactory;

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

    /** @test */
    public function normal_pass()
    {
        $includes = ['stocks', 'descriptions'];

        $result = $this->action->execute($includes, clone $this->queryData, ProductIncludesEnum::class);

        $this->assertEquals(RequestQueryData::class, get_class($result));
        $this->assertNotSameSize($this->queryData->includes, $result->includes);
    }

    /** @test */
    public function with_wrong_includes()
    {
        $includes = ['name', 'show'];

        $this->checkResultsForSameSize($includes, clone $this->queryData);
    }

    protected function checkResultsForSameSize(array $includes, $queryData)
    {
        $result = $this->action->execute($includes, $queryData, ProductIncludesEnum::class);

        $this->assertEquals(RequestQueryData::class, get_class($result));
        $this->assertSameSize($this->queryData->includes, $result->includes);
    }

    /** @test */
    public function with_identical_includes()
    {
        $includes = ['brand'];

        $this->checkResultsForSameSize($includes, clone $this->queryData);
    }

    /** @test */
    public function with_empty_query()
    {
        $includes = ['brand'];
        $emptyQueryData = new RequestQueryData();

        $this->checkResultsForSameSize($includes, $emptyQueryData);
    }
}

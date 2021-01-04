<?php

namespace Grixu\SociusClient\Tests\Query;

use Grixu\SociusClient\Query\Actions\PrepareQueryAction;
use Grixu\SociusClient\Query\DataTransferObjects\FilterDataCollection;
use Grixu\SociusClient\Query\DataTransferObjects\RequestQueryData;
use PHPUnit\Framework\TestCase;
use Grixu\SociusClient\Tests\Factories\Query\FilterDataFactory;
use Grixu\SociusClient\Tests\Factories\Query\RequestQueryDataFactory;

class PrepareQueryActionTest extends TestCase
{
    private PrepareQueryAction $action;

    protected function setUp(): void
    {
        parent::setUp();
        $this->action = new PrepareQueryAction();
    }

    /** @test */
    public function normal_pass()
    {
        $queryData = RequestQueryDataFactory::new()->create();

        $result = $this->action->execute($queryData);
        $filterName = $queryData->filters->items()[0]->field;
        $includeName = $queryData->includes[0];
        $sortName = $queryData->sorts[0];

        $this->basicCheckResult($result, $filterName, $includeName, $sortName);
    }

    protected function basicCheckResult($result, $filterName, $includeName, $sortName)
    {
        $this->assertStringContainsString('filter', $result);
        $this->assertStringContainsString('include=', $result);
        $this->assertStringContainsString('sort=', $result);
        $this->assertStringContainsString('filter['.$filterName.']', $result);
        $this->assertStringContainsString('include='.$includeName, $result);
        $this->assertStringContainsString('sort='.$sortName, $result);
    }

    /** @test */
    public function with_page()
    {
        $queryData = RequestQueryDataFactory::new()->create(['page' => 2]);

        $result = $this->action->execute($queryData);
        $filterName = $queryData->filters->items()[0]->field;
        $includeName = $queryData->includes[0];
        $sortName = $queryData->sorts[0];

        $this->basicCheckResult($result, $filterName, $includeName, $sortName);
        $this->assertStringContainsString('page=', $result);
        $this->assertStringContainsString('page=2', $result);
    }

    /** @test */
    public function without_sorts()
    {
        $queryData = new RequestQueryData(
            [
                'filters' => FilterDataCollection::create(
                    [FilterDataFactory::new()->create()->toArray()]
                ),
                'includes' => [
                    'brand'
                ],
                ]);

        $result = $this->action->execute($queryData);
        $filterName = $queryData->filters->items()[0]->field;
        $includeName = $queryData->includes[0];

        $this->assertStringContainsString('filter', $result);
        $this->assertStringContainsString('include=', $result);
        $this->assertStringNotContainsString('sort=', $result);
        $this->assertStringContainsString('filter['.$filterName.']', $result);
        $this->assertStringContainsString('include='.$includeName, $result);
    }

    /** @test */
    public function without_includes()
    {
        $queryData = new RequestQueryData(
            [
                'filters' => FilterDataCollection::create(
                    [FilterDataFactory::new()->create()->toArray()]
                ),
                'sorts' => [
                    'index'
                ]
            ]);

        $result = $this->action->execute($queryData);
        $filterName = $queryData->filters->items()[0]->field;
        $sortName = $queryData->sorts[0];

        $this->assertStringContainsString('filter', $result);
        $this->assertStringNotContainsString('include=', $result);
        $this->assertStringContainsString('sort=', $result);
        $this->assertStringContainsString('filter['.$filterName.']', $result);
        $this->assertStringContainsString('sort='.$sortName, $result);
    }
}

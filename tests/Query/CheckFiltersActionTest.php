<?php

namespace Grixu\SociusClient\Tests\Query;

use Grixu\SociusClient\Product\Enums\ProductFiltersEnum;
use Grixu\SociusClient\Query\Actions\CheckFiltersAction;
use Grixu\SociusClient\Query\DataTransferObjects\FilterDataCollection;
use PHPUnit\Framework\TestCase;

class CheckFiltersActionTest extends TestCase
{
    private CheckFiltersAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new CheckFiltersAction();
    }

    /** @test */
    public function with_proper_params()
    {
        $arrData = $this->makeArrData();
        $filters = FilterDataCollection::create($arrData);

        $result = $this->action->execute($filters, ProductFiltersEnum::class);

        $this->assertEquals(true, $result);
    }

    protected function makeArrData(?string $fieldName = 'index'): array
    {
        return [
            [
                'field' => 'name',
                'values' => [
                    'SZKLO',
                ],
            ],
            [
                'field' => $fieldName,
                'values' => [
                    '725',
                ],
            ],
        ];
    }

    /** @test */
    public function with_wrong_params()
    {
        $arrData = $this->makeArrData('lol');
        $filters = FilterDataCollection::create($arrData);

        $result = $this->action->execute($filters, ProductFiltersEnum::class);

        $this->assertEquals(false, $result);
    }
}

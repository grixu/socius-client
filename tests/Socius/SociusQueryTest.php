<?php

namespace Grixu\SociusClient\Tests\Socius;

use Grixu\SociusClient\Product\DataTransferObjects\ProductDataCollection;
use Grixu\SociusClient\Query\Actions\AddFilterAction;
use Grixu\SociusClient\Query\Actions\AddIncludeAction;
use Grixu\SociusClient\Query\Actions\AddSortAction;
use Grixu\SociusClient\Query\Actions\CallApiAction;
use Grixu\SociusClient\Query\Actions\MakeResultDataAction;
use Grixu\SociusClient\Query\Actions\PrepareQueryAction;
use Grixu\SociusClient\Query\DataTransferObjects\RequestQueryData;
use Grixu\SociusClient\Query\Exceptions\ApiCallException;
use Grixu\SociusClient\Query\Exceptions\TokenIssueException;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\SociusDomainEnum;
use Grixu\SociusClient\SociusQuery;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Grixu\SociusClient\Tests\Helpers\SociusQueryHelper;
use Orchestra\Testbench\TestCase;

/**
 * Class SociusQueryTest
 * @package Grixu\SociusClient\Tests\Socius
 */
class SociusQueryTest extends TestCase
{
    private SociusQuery $query;

    protected function setUp(): void
    {
        parent::setUp();

        $this->query = new SociusQueryHelper(SociusDomainEnum::PRODUCT());
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    /** @test */
    public function constructor()
    {
        $this->assertEquals(AddFilterAction::class, get_class($this->query->getAddFilterAction()));
        $this->assertEquals(AddIncludeAction::class, get_class($this->query->getAddIncludeAction()));
        $this->assertEquals(AddSortAction::class, get_class($this->query->getAddSortAction()));
        $this->assertEquals(PrepareQueryAction::class, get_class($this->query->getPrepareQueryAction()));
        $this->assertEquals(CallApiAction::class, get_class($this->query->getCallApiAction()));
        $this->assertEquals(MakeResultDataAction::class, get_class($this->query->getMakeResultDataAction()));
        $this->assertEquals(SociusDomainEnum::PRODUCT(), $this->query->getDomain());
        $this->assertEquals(RequestQueryData::class, get_class($this->query->getQuery()));
        $this->assertNotEmpty($this->query->getAllowedFilters());
        $this->assertNotEmpty($this->query->getAllowedIncludes());
        $this->assertNotEmpty($this->query->getAllowedParsers());
        $this->assertNotEmpty($this->query->getAllowedSorts());
        $this->assertNotEmpty($this->query->getBaseUrl());
        $this->assertNotEmpty($this->query->getParser());
        $this->assertNotEmpty($this->query->getDomainFiltersEnum());
        $this->assertNotEmpty($this->query->getDomainIncludesEnum());
        $this->assertNotEmpty($this->query->getDomainSortsEnum());
        $this->assertStringContainsString('Product', $this->query->getDomainFiltersEnum());
        $this->assertStringContainsString('Product', $this->query->getDomainSortsEnum());
        $this->assertStringContainsString('Product', $this->query->getDomainIncludesEnum());
    }

    /** @test */
    public function add_filter()
    {
        $this->query->addFilter('name', 'SZKLO');

        $this->assertNotEmpty($this->query->getQuery()->filters);
    }

    /** @test */
    public function add_wrong_filter()
    {
        $this->query->addFilter('queue', 'dupa');

        $this->assertEmpty($this->query->getQuery()->filters);
    }

    /** @test */
    public function duplicate_filters()
    {
        $this->query->addFilter('name', 'SZKLO');
        $this->query->addFilter('name', 'SZKLO');

        $this->assertNotEmpty($this->query->getQuery()->filters);
        $this->assertCount(1, $this->query->getQuery()->filters);
    }

    /** @test */
    public function add_sort()
    {
        $this->query->addSort('name');

        $this->assertNotEmpty($this->query->getQuery()->sorts);
    }

    /** @test */
    public function add_wrong_sort()
    {
        $this->query->addSort('queue');

        $this->assertEmpty($this->query->getQuery()->sorts);
    }

    /** @test */
    public function duplicate_sort()
    {
        $this->query->addSort('name');
        $this->query->addSort('name');

        $this->assertNotEmpty($this->query->getQuery()->sorts);
        $this->assertCount(1, $this->query->getQuery()->sorts);
    }

    /** @test */
    public function add_include()
    {
        $this->query->addInclude('brand');

        $this->assertNotEmpty($this->query->getQuery()->includes);
    }

    /** @test */
    public function add_wrong_include()
    {
        $this->query->addInclude('queue');

        $this->assertEmpty($this->query->getQuery()->includes);
    }

    /** @test */
    public function duplicate_include()
    {
        $this->query->addInclude('brand');
        $this->query->addInclude('brand');

        $this->assertNotEmpty($this->query->getQuery()->includes);
        $this->assertCount(1, $this->query->getQuery()->includes);
    }

    /** @test */
    public function fetch()
    {
        $this->query->fetch(1);

        $this->assertNotEmpty($this->query->getRawResults());
        $this->assertNotEmpty($this->query->getResults());
        $this->assertEquals(ProductDataCollection::class, get_class($this->query->getResults()));
    }

    /** @test */
    public function fetch_with_http_error()
    {
        Cache::forget('socius-token');
        Http::fake(
            [
                '*' => Http::sequence()
                    ->push(
                        [
                            'access_token' => 'blebleble'
                        ],
                        200
                    )
                    ->push('Not Found.', 404)
            ]
        );

        try {
            $this->query->fetch(1);
            $this->assertTrue(false);
        } catch (ApiCallException $e) {
            $this->assertTrue(true);
        } catch (TokenIssueException $e) {
            $this->assertTrue(false);
        }
    }

    /** @test */
    public function with_token_error()
    {
        Cache::forget('socius-token');
        Http::fake(
            [
                '*' => Http::response('Not Found.', 404)
            ]
        );

        try {
            $this->query->fetch(1);
            $this->assertTrue(false);
        } catch (ApiCallException $e) {
            $this->assertTrue(false);
        } catch (TokenIssueException $e) {
            $this->assertTrue(true);
        }
    }

    /** @test */
    public function fetch_with_token_refresh()
    {
        // First time normal HTTP query, everything just fine. Token now in Cache
        $this->query->fetch(1);

        Http::fake(
            [
                '*' => Http::sequence()
                    ->push('Not Allowed.', 401)
                    ->push(
                        [
                            'access_token' => 'blebleble'
                        ],
                        200
                    )
                    ->push(
                        [
                            'data' => [
                                'data' => [
                                    [
                                        'id' => 1,
                                        'name' => "SZKLO BEZBARWNE FI-50",
                                        'index' => "7250050099",
                                        'ean' => "5906340872459",
                                        'measure_unit' => "SZT",
                                        'tax_group' => "A",
                                        'tax_value' => 23,
                                        'blocked' => "Domain\\Product\\States\\ProductUnlocked",
                                        'archived' => "Domain\\Product\\States\\ProductUnarchived",
                                        'weight' => 0.01,
                                        'eshop' => "Domain\\Product\\States\\ProductHiddenInEShop",
                                        'availability' => "Domain\\Product\\States\\ProductUnavailable",
                                        'attachments' => "Domain\\Product\\States\\ProductHasNoAttachment",
                                        'sync_ts' => "2020-10-27T05:00:10.000000Z",
                                        'xl_id' => 46079,
                                        'brand_id' => null,
                                        'product_type_id' => null,
                                        'price' => null,
                                        'price_updated' => null,
                                        'created_at' => "2020-10-21T09:50:32.000000Z",
                                        'updated_at' => "2020-10-27T05:53:47.000000Z",
                                        'brand' => null,
                                        'product_type' => null
                                    ]
                                ],
                                'current_page' => 1,
                                'last_page' => 1,
                                'per_page' => 1,
                                'total' => 1,
                                'from' => 1,
                                'to' => 1,
                                'next_page_url' => 'http',
                            ]
                        ],
                        200
                    )
            ]
        );

        $this->query->fetch(1);
        $this->assertNotEmpty($this->query->getResults());
    }
}

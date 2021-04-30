<?php

namespace Grixu\SociusClient\Tests\Helpers;

use Grixu\ApiClient\JsonApiFetcher;
use Grixu\Synchronizer\Contracts\LoaderInterface;
use Illuminate\Support\Collection;

class LoaderTestCase extends TestCase
{
    protected LoaderInterface $loader;
    protected string $loaderClass;

    protected function setUp(): void
    {
        parent::setUp();

        $this->loader = new ($this->loaderClass)();
    }

    /** @test */
    public function it_builds_query()
    {
        $this->loader->buildQuery();

        $this->assertBuilder();
    }

    protected function assertBuilder()
    {
        $this->assertNotEmpty($this->loader->getBuilder());
        $this->assertTrue($this->loader->getBuilder() instanceof JsonApiFetcher);
    }

    /** @test */
    public function it_can_build_query_with_specified_fk()
    {
        $this->loader->buildQuery([1,2,3]);

        $this->assertBuilder();
    }

    /** @test */
    public function getters_working_fine()
    {
        $returnedData = $this->loader->get();

        $this->assertNotEmpty($returnedData);
        $this->assertTrue($returnedData instanceof Collection);

        $returnedData = $this->loader->getRaw();

        $this->assertNotEmpty($returnedData);
        $this->assertTrue($returnedData instanceof Collection);

        $returnedData = $this->loader->getCount();

        $this->assertNotEmpty($returnedData);
        $this->assertGreaterThan(0, $returnedData);
    }
}

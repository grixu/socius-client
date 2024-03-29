<?php

namespace Grixu\SociusClient;

use Exception;
use Grixu\ApiClient\JsonApiFetcher;

/**
 * @method product()
 * @method product_type()
 * @method brand()
 * @method category()
 * @method operator()
 * @method operator_role()
 * @method branch()
 * @method language()
 * @method warehouse()
 * @method stock()
 * @method order()
 * @method order_element()
 * @method product_relations()
 * @method category_relations()
 * @method operator_relations()
 * @method description_relations()
 * @method warehouse_relations()
 * @method stock_relations()
 * @method order_relations()
 * @method order_element_relations()
 * @method product_dataset()
 * @method category_dataset()
 * @method operator_dataset()
 * @method description_dataset()
 * @method warehouse_dataset()
 * @method stock_dataset()
 * @method order_dataset()
 * @method order_element_dataset()
 */
class SociusClient
{
    public function __call(string $name, array $parameters): JsonApiFetcher
    {
        if (str_contains($name, '_relations')) {
            $name = str_replace('_relations', '', $name);
            return $this->makeRelationsFetcher($name);
        }

        if (str_contains($name, '_dataset')) {
            $name = str_replace('_dataset', '', $name);
            return $this->makeDatasetFetcher($name);
        }

        return $this->makeModuleFetcher($name);
    }

    protected function makeModuleFetcher(string $name)
    {
        $this->validateConfig($name);

        return new JsonApiFetcher(
            JsonApiConfigFactory::makeConfig($name),
            config("socius-client.{$name}.url")
        );
    }

    protected function makeRelationsFetcher(string $name)
    {
        $this->validateConfig($name);

        return new JsonApiFetcher(
            JsonApiConfigFactory::makeBasicConfig(),
            config("socius-client.{$name}.url").'/relations'
        );
    }

    protected function makeDatasetFetcher(string $name)
    {
        $this->validateConfig($name);

        return new JsonApiFetcher(
            JsonApiConfigFactory::makeConfig($name),
            config("socius-client.{$name}.url").'/dataset'
        );
    }

    protected function validateConfig($name): void
    {
        if (empty(config("socius-client.{$name}"))) {
            throw new Exception("Module {$name} is not configured.");
        }

        if (empty(config("socius-client.{$name}.url"))) {
            throw new Exception("Module {$name}: Url is not configured.");
        }

        if (!is_array(config("socius-client.{$name}.filters"))) {
            throw new Exception("Module {$name}: Filters is not configured.");
        }

        if (!is_array(config("socius-client.{$name}.sorts"))) {
            throw new Exception("Module {$name}: Sorts is not configured.");
        }

        if (!is_array(config("socius-client.{$name}.includes"))) {
            throw new Exception("Module {$name}: Includes is not configured.");
        }
    }
}

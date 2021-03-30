<?php

namespace Grixu\SociusClient;

use Exception;
use Grixu\ApiClient\JsonApiFetcher;

/**
 * @method product
 * @method product_type
 * @method brand
 * @method category
 * @method operator
 * @method operator_role
 * @method branch
 * @method language
 * @method warehouse
 * @method stock
 * @method order
 * @method order_element
 * @method product_relationship
 * @method category_relationship
 * @method operator_relationship
 * @method description_relationship
 * @method warehouse_relationship
 * @method stock_relationship
 * @method order_relationship
 * @method order_element_relationship
 * @method product_full
 * @method category_full
 * @method operator_full
 * @method description_full
 * @method warehouse_full
 * @method stock_full
 * @method order_full
 * @method order_element_full
 */
class SociusClient
{
    public function __call(string $name, array $parameters): JsonApiFetcher
    {
        if (str_contains($name, '_relationship')) {
            $name = str_replace('_relationship', '', $name);
            return $this->makeRelationshipFetcher($name);
        }

        if (str_contains($name, '_full')) {
            $name = str_replace('_full', '', $name);
            return $this->makeFullFetcher($name);
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

    protected function makeRelationshipFetcher(string $name)
    {
        $this->validateConfig($name);

        return new JsonApiFetcher(
            JsonApiConfigFactory::makeBasicConfig(),
            config("socius-client.{$name}.url").'/relationships'
        );
    }

    protected function makeFullFetcher(string $name)
    {
        $this->validateConfig($name);

        return new JsonApiFetcher(
            JsonApiConfigFactory::makeConfig($name),
            config("socius-client.{$name}.url").'/full'
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

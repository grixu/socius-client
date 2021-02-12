<?php

namespace Grixu\SociusClient;

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
 * @method description
 * @method warehouse
 * @method stock
 */
class SociusClient
{
    public function __call(string $name, array $parameters): JsonApiFetcher
    {
        $this->validateConfig($name);

        return new JsonApiFetcher(
            JsonApiConfigFactory::makeConfig($name),
            config("socius-client.{$name}.url")
        );
    }

    protected function validateConfig($name): void
    {
        if (empty(config("socius-client.{$name}"))) {
            throw new \Exception("Module {name} is not configured.");
        }

        if (empty(config("socius-client.{$name}.url"))) {
            throw new \Exception("Module {$name}: Url is not configured.");
        }

        if (!is_array(config("socius-client.{$name}.filters"))) {
            throw new \Exception("Module {$name}: Filters is not configured.");
        }

        if (!is_array(config("socius-client.{$name}.sorts"))) {
            throw new \Exception("Module {$name}: Sorts is not configured.");
        }

        if (!is_array(config("socius-client.{$name}.includes"))) {
            throw new \Exception("Module {$name}: Includes is not configured.");
        }
    }
}

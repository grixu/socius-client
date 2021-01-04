<?php

namespace Grixu\SociusClient\Support\Tests;

abstract class Factory
{
    abstract public function create(array $parameters = []);

      public static function new(): self
    {
        return new static();
    }

    public static function times(int $times): FactoryCollection
    {
        return new FactoryCollection(static::class, $times);
    }
}

<?php

namespace Grixu\SociusClient\Support\Tests;

abstract class Factory
{
    abstract public function create(array $parameters = []);

    /**
     * @return static
     */
    public static function new(): self
    {
        return new static();
    }

    /**
     * @param int $times
     *
     * @return FactoryCollection
     */
    public static function times(int $times): FactoryCollection
    {
        return new FactoryCollection(static::class, $times);
    }
}

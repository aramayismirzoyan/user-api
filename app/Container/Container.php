<?php

namespace App\Container;

use Exception;

class Container
{
    private $bindings = [];

    public function set(string $id, callable $factory): void
    {
        $this->bindings[$id] = $factory;
    }

    public function get(string $id)
    {
        if (! isset($this->bindings[$id])) {
            throw new Exception("Container does not exist.");
        }

        $factory = $this->bindings[$id];

        return $factory($this);
    }
}

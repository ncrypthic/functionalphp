<?php
namespace LLA\Functional;

interface Pattern
{
    /**
     * @param Typesafe $value
     * @param callable $callback
     * @return callable
     */
    public function case(Typesafe $value, $callback);
}

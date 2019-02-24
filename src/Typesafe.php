<?php
namespace LLA\Functional;

interface Typesafe extends Value
{
    /**
     * Get current object type
     *
     * @return string
     */
    public function getType();
    /**
     * Cast objet to specified type
     *
     * @param Typesafe $type Target type
     * @return Option
     */
    public function asType(Typesafe $type);
    /**
     * Check type safety equality
     * @return boolean
     */
    public function equals(Typesafe $type);
}


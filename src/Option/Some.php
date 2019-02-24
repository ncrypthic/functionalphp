<?php
namespace LLA\Functional\Option;

use LLA\Functional\Typesafe;

class Some implements Typesafe
{
    use Option;

    public function __construct($value)
    {
        $this->value = $value;
        $this->pristine = $value;
        $this->isEmpty = false;
    }
}

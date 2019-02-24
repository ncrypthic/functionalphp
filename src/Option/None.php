<?php
namespace LLA\Functional\Option;

use LLA\Functional\Typesafe;

class None implements Typesafe
{
    use Option;

    public function __construct()
    {
        $this->value = null;
        $this->pristine = null;
        $this->isEmpty = true;
    }
}

<?php
namespace LLA\Functional\Execute;

use LLA\Functional\Typesafe;

class Success implements Typesafe
{
    use Execute;

    public function __construct($value)
    {
        $this->result = $value;
    }
}

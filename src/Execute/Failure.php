<?php
namespace LLA\Functional\Execute;

use LLA\Functional\Typesafe;

class Failure implements Typesafe
{
    use Execute;

    public function __construct(\Exception $value)
    {
        $this->result = $value;
    }
}

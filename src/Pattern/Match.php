<?php
namespace LLA\Functional\Pattern;

use LLA\Functional\Value;
use LLA\Functional\Typesafe;
use LLA\Functional\Pattern;

final class Match implements Value, Pattern
{
    private $wasMatched;

    public function __construct(Value $value)
    {
        $this->pristine = $value;
        $this->result = null;
    }
    /**
     * Case match
     * @param Typesafe $any
     * @param callable $callback
     * @return Match
     */
    public function case(Typesafe $any, $callback)
    {
        if(!$this->result && $this->pristine->equals($any)) {
            $this->result = call_user_func_array($callback, [$this->pristine->val()]);
        }
        return $this;
    }
    /**
     * {@inheritdoc}
     */
    public function val()
    {
        return $this->result;
    }
}


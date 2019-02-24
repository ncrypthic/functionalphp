<?php
namespace LLA\Functional\Execute;

use LLA\Functional\Typesafe;
use LLA\Functional\Pattern\Match;

trait Execute
{
    private $result;
    /**
     * {@inheritdoc}
     */
    public function val()
    {
        return $this->result;
    }
    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return self::class;
    }
    /**
     * {@inheritdoc}
     */
    public function asType(Typesafe $type)
    {
        return new self(null, true);
    }
    /**
     * {@inheritdoc}
     */
    public function equals(Typesafe $type)
    {
        return $type->getType() === $this->getType();
    }
    /**
     * @return PatternMatch
     */
    public function match()
    {
        return new Match($this);
    }
}

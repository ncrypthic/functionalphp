<?php
namespace LLA\Functional\Option;

use LLA\Functional\Typesafe;
use LLA\Functional\Pattern\Match;

trait Option
{
    private $value;
    private $pristine;
    private $isEmpty;

    /**
     * {@inheritdoc}
     */
    public function val()
    {
        return $this->pristine;
    }
    /**
     * {@inheritdoc}
     */
    public function equals(Typesafe $type)
    {
        return get_class($type) === self::class && $this->val() === $this->val();
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
     * @return PatternMatch
     */
    public function match()
    {
        return new Match($this);
    }
}

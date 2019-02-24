<?php
namespace LLA\Functional;

final class Identity implements Value
{
    private $pristine;

    private function __construct($value)
    {
        $this->pristine = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function val()
    {
        return $this->pristine;
    }

    /**
     * @param mixed $value
     * @return Identity
     */
    public static function create($value)
    {
        return new self($value);
    }

    /**
     * Return value of an identity monad
     *
     * @param Identity $id
     * @return mixed
     */
    public static function value(Identity $id)
    {
        return $id->pristine;
    }
}

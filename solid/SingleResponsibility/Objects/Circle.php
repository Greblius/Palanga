<?php

namespace solid\SingleResponsibility\Objects;

class Circle
{
    const PI = 3.14;

    /** @var  float */
    private $radius;

    /**
     * Circle constructor.
     * @param float $radius
     */
    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    /**
     * @return float
     */
    public function countArea()
    {
        return self::PI * pow($this->radius, 2);
    }
}
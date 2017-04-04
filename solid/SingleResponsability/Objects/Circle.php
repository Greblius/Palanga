<?php

class Circle implements FigureInterface
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

    /**
     * @return float
     */
    public function countPerimeter()
    {
        return self::PI * $this->radius;
    }
}
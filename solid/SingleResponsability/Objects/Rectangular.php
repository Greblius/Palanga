<?php

class Rectangular implements FigureInterface
{
    /** @var  float */
    private $marginalX, $marginalY;

    /**
     * Rectangular constructor.
     * @param float $marginalX
     * @param float $marginalY
     */
    public function __construct($marginalX, $marginalY)
    {
        $this->marginalX = $marginalX;
        $this->marginalY = $marginalY;
    }

    /**
     * @return float
     */
    public function countArea()
    {
        return $this->marginalX * $this->marginalY;
    }

    /**
     * @return float
     */
    public function countPerimeter()
    {
        return 2 * ($this->marginalX + $this->marginalY);
    }
}
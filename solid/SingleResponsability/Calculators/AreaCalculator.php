<?php

class AreaCalculator
{
    /** @var  FigureInterface[] */
    private $shapes;

    /** @var float */
    private $totalPerimeter;

    /** @var float */
    private $totalArea;

    public function __construct($shapes)
    {
        $this->shapes = $shapes;
        $this->totalPerimeter = 0.0;
        $this->totalArea = 0.0;
    }

    /**
     * @return float
     */
    public function getTotalPerimeter()
    {
        return $this->totalPerimeter;
    }

    /**
     * @return float
     */
    public function getTotalArea()
    {
        return $this->totalArea;
    }

    public function sumPerimeter()
    {
        foreach ($this->shapes as $shape) {
            $this->totalPerimeter += $shape->countPerimeter();
        }
    }

    public function sumArea()
    {
        foreach ($this->shapes as $shape) {
            $this->totalArea += $shape->countArea();
        }
    }
}
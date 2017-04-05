<?php

namespace solid\OpenClose\Calculators;

class PerimeterCalculator
{
    /** @var float */
    private $totalPerimeter;

    /** @var  FigureInterface[] */
    private $shapes;

    public function __construct($shapes)
    {
        $this->shapes = $shapes;
        $this->totalPerimeter = 0.0;
        $this->sumPerimeter();
    }

    /**
     * @return float
     */
    public function getTotalPerimeter()
    {
        return $this->totalPerimeter;
    }

    protected function sumPerimeter()
    {
        foreach ($this->shapes as $shape) {
            $this->totalPerimeter += $shape->countPerimeter();
        }
    }
}
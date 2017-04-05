<?php

namespace solid\OpenClose\Calculators;

use solid\OpenClose\Objects\FigureInterface;

class AreaCalculator
{
    /** @var  FigureInterface[] */
    private $shapes;

    /** @var float */
    private $totalArea;

    public function __construct($shapes)
    {
        $this->shapes = $shapes;
        $this->totalArea = 0.0;
        $this->sumArea();
    }

    /**
     * @return float
     */
    public function getTotalArea()
    {
        return $this->totalArea;
    }

    protected function sumArea()
    {
        foreach ($this->shapes as $shape) {
            $this->totalArea += $shape->countArea();
        }
    }
}
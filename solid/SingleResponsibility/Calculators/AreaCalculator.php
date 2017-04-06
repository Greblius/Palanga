<?php

namespace solid\SingleResponsibility\Calculators;

use solid\SingleResponsibility\Objects\Circle;

class AreaCalculator
{
    private $shapes;

    /** @var float */
    private $totalArea;

    public function __construct($shapes)
    {
        $this->shapes = $shapes;
        $this->totalArea = 0.0;
    }

    /**
     * @return float
     */
    public function getTotalArea()
    {
        return $this->totalArea;
    }


    public function sumArea()
    {
        /** @var Circle $shape */
        foreach ($this->shapes as $shape) {
            $this->totalArea += $shape->countArea();
        }
    }
}
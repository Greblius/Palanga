<?php

namespace solid\OpenClose;

use solid\OpenClose\Calculators\AreaCalculator;
use solid\OpenClose\Calculators\PerimeterCalculator;
use solid\OpenClose\Objects\Circle;
use solid\OpenClose\Objects\Rectangular;
use solid\OpenClose\Objects\Triangle;

class Execute
{
    public function __construct()
    {
        $shapes = [
            new Rectangular(5, 7),
            new Triangle(3, 5, 6),
            new Circle(5),
            new Circle(7)
        ];

        $areaCalc = new AreaCalculator($shapes);
        $perimeterCalc = new PerimeterCalculator($shapes);


        echo $areaCalc->getTotalArea();
        echo '<br>';
        echo $perimeterCalc->getTotalPerimeter();
    }
}
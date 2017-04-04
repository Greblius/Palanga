<?php

class Output
{
    public function __construct()
    {
        $shapes = [
            new Rectangular(5, 7),
            new Triangle(3, 5, 6),
            new Circle(5),
            new Circle(7)
        ];

        $calculator = new AreaCalculator($shapes);

        echo $calculator->getTotalPerimeter();
        echo "<br>";
        echo $calculator->getTotalArea();
    }
}
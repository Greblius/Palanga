<?php

namespace solid\SingleResponsibility\Output;

use solid\SingleResponsibility\Calculators\AreaCalculator;

class XmlOutput
{
    /** @var  AreaCalculator */
    private $calculator;

    public function __construct($shapes)
    {
        $calculator = new AreaCalculator($shapes);
        $this->calculator = $calculator;
    }

    public function outputXml()
    {
        $xml = '<?xml version="1.0" encoding="ISO-8859-1"?>';
        $xml .= '<totalAreaOfCircles>'.$this->calculator->getTotalArea().'</totalAreaOfCircles>';

        echo $xml;
    }
}
<?php

namespace solid\SingleResponsibility;

use solid\SingleResponsibility\Objects\Circle;
use solid\SingleResponsibility\Output\XmlOutput;

class Execute
{
    public function __construct()
    {
        $shapes = [
            new Circle(5),
            new Circle(7)
        ];

        $xmlOutPutProcessor = new XmlOutput($shapes);
        $xmlOutPutProcessor->outputXml();
    }
}
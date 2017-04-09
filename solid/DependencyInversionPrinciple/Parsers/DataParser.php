<?php

namespace solid\DependencyInversionPrinciple;

class DataParser
{
    private $fileContent;

    public function __construct(FileReader $fileData)
    {
        $this->fileContent = $fileData;
    }

    public function parseData()
    {
        $fileData = $this->fileContent->readDataFromFile();
    }
}
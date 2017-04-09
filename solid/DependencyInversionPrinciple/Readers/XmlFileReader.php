<?php

namespace solid\DependencyInversionPrinciple;

class XmlFileReader implements FileReader
{
    private $fileContent;

    public function __construct($file)
    {
        $this->fileContent = file_get_contents($file);
    }

    public function readDataFromFile()
    {
        echo 'data read from XML file';
    }
}
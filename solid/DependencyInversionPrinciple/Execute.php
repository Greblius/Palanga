<?php

namespace solid\DependencyInversionPrinciple;

$xmlFile = '/var/www/orders.xml';

$fileReader = new XmlFileReader($xmlFile);
$parser = new DataParser($fileReader);
$parser->parseData();

$jsonFile = '/var/www/orders.json';

$fileReaderJson = new JsonFileReader($jsonFile);
$parser = new DataParser($fileReaderJson);
$parser->parseData();
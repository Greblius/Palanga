<?php

namespace solid\InterfaceSegregation;

use solid\InterfaceSegregation\Cars\Corvette;
use solid\InterfaceSegregation\Cars\Toyota;

$toyta = new Toyota();
$toyta->startCar();
$toyta->stopCar();

$corvette = new Corvette();
$corvette->startCar();
$corvette->burnout();
$corvette->driveFast();
$corvette->burnout();
$corvette->stopCar();
<?php

namespace solid\InterfaceSegregation\Cars;


class Corvette implements StandardCar, SuperCar
{

    public function startCar()
    {
        echo 'amazing sound';
    }

    public function stopCar()
    {
        echo 'car stopped';
    }

    public function driveFast()
    {
        echo '300 km/h';
    }

    public function burnout()
    {
        echo 'burnout';
    }
}
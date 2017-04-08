<?php

namespace solid\InterfaceSegregation\Cars;


class Mercedes implements StandardCar, LuxuryCar
{

    public function driveLongDistance()
    {
        echo 'Chill & drive';
    }

    public function turnACOn()
    {
        echo "It's chilly";
    }

    public function startCar()
    {
        echo 'Nice sound';
    }

    public function stopCar()
    {
        echo 'Car stopped';
    }
}
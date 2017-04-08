<?php

namespace solid\InterfaceSegregation\Cars;

class Toyota implements StandardCar
{
    public function startCar()
    {
        echo 'Car started';
    }

    public function stopCar()
    {
        echo 'Car stopped';
    }
}

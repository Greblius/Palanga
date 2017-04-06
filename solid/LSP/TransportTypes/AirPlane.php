<?php

namespace solid\LSP\TransportTypes;

class AirPlane extends Vehicle
{
    private $routineCheckDone = false;

    private function runRoutineCheck()
    {
        $this->routineCheckDone = true;
    }

    public function prepareVehicle()
    {
        $this->runRoutineCheck();
        parent::prepareVehicle();
    }
}
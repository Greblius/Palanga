<?php

namespace solid\LSP\TransportTypes;

class Lorry extends Vehicle
{
    /** @var bool */
    private $flatTyres = true;

    private function inflateTyres()
    {
        $this->flatTyres = false;
    }

    public function prepareVehicle()
    {
        $this->inflateTyres();
        parent::prepareVehicle();
    }
}
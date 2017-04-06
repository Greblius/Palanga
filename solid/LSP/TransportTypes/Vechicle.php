<?php

namespace solid\LSP\TransportTypes;

abstract class Vehicle
{
    /** @var bool */
    private $tankIsFull = false;

    /** @var bool */
    private $cargoLoaded = false;

    /** @var bool */
    private $shipmentDelivered = false;

    private function fuelTransporter()
    {
        $this->tankIsFull = true;
    }

    private function loadFreight()
    {
        $this->cargoLoaded = true;
    }

    private function deliverCargo()
    {
        $this->shipmentDelivered = true;
    }

    public function prepareVehicle()
    {
        $this->fuelTransporter();
        $this->loadFreight();
    }

    public function deliverFreight()
    {
        $this->deliverCargo();
    }
}
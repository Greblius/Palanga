<?php

namespace solid\LSP\ShipmentDistributors;

use solid\LSP\TransportTypes\AirPlane;
use solid\LSP\TransportTypes\Lorry;
use solid\LSP\TransportTypes\Ship;
use solid\LSP\TransportTypes\Vehicle;

class ShipmentProcessor
{
    /** @var float */
    private $weight = 0.0;

    public function __construct($weight)
    {
        $this->weight = $weight;
    }

    public function initShipping()
    {
        $vehicle = $this->selectTransportType();
        $vehicle->prepareVehicle();
        $vehicle->deliverFreight();
    }

    /**
     * @return Vehicle
     */
    private function selectTransportType()
    {
        $vehicle = null;

        if ($this->weight < 20) {
            $vehicle = new Lorry();
        } elseif ($this->weight >= 20 && $this->weight < 30) {
            $vehicle = new AirPlane();
        } elseif ($this->weight > 30) {
            $vehicle = new Ship();
        }

        return $vehicle;
    }
}
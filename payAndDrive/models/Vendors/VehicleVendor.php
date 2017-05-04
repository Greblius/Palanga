<?php

namespace payAndDrive\models\Vendors;

use payAndDrive\models\Clients\Client;
use payAndDrive\models\Vehicles\Vehicle;

abstract class VehicleVendor
{
    private $vehicles;

    public function getVehicleList()
    {
        return $this->vehicles;
    }

    public function sellVehicle(Vehicle $vehicle)
    {
        $vehicle->setIsSold(true);
    }

    /**
     * @param Vehicle $vehicle
     * @param Client $client
     * @return bool
     */
    function checkIfVehicleIsGood($vehicle, $client)
    {
        $good = false;

        if (!$vehicle->isSold() && $client->getBudget() >= $vehicle->getPrice()
            && $client->isEconomical() === $vehicle->isEconomical()
            && $client->isDefective() === $vehicle->isDefective() && !$client->isHasCar()) {
            $good = true;
        }

        return $good;
    }
}
<?php

namespace payAndDrive\Models\Vendors;

use payAndDrive\Models\Clients\Client;
use payAndDrive\Models\Vehicles\Vehicle;

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
            && $client->getCarRequirements()->isEconomical() === $vehicle->isEconomical()
            && $client->getCarRequirements()->isDefective() === $vehicle->isDefective() && !$client->isHasCar()) {
            $good = true;
        }

        return $good;
    }
}
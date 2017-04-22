<?php

namespace payAndDrive\Models\Vendors;

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
     * @param array $owner
     * @return bool
     */
    function checkIfVehicleIsGood($vehicle, $owner)
    {
        $good = false;

        if (!$vehicle->isSold() && $owner['budget'] >= $vehicle->getPrice()
            && $owner['economical'] === $vehicle->isEconomical()
            && $owner['defective'] === $vehicle->isDefective()) {
            $good = true;
        }

        return $good;
    }
}
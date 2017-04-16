<?php

namespace payAndDrive\Vendors;

use payAndDrive\Vehicles\Vehicle;

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
}
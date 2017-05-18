<?php

namespace payAndDrive\Models\Vehicles;

class VehicleFactory
{
    public static function create($vehicleType, $vehicleName, $vehiclePrice, $hackVehicle = false)
    {
        $vehicle = null;
        if (class_exists($vehicleType)) {
            /** @var Vehicle $vehicle */
            $vehicle = new $vehicleType;
            $vehicle->setBrand($vehicleName);
            $vehicle->setPrice($vehiclePrice);

            if ($hackVehicle && $vehicle instanceof UsedCar) {
                $vehicle->hackCarSystem();
            }
        }

        return $vehicle;
    }
}
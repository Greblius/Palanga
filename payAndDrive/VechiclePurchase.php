<?php

namespace payAndDrive\Vendors;

use payAndDrive\Vehicles\NewCar;
use payAndDrive\Vehicles\Vehicle;

$john = [
    'budget' => 10000,
    'odometer' => 110000,
    'economical' => true,
    'defective' => false,
];

$zigmas = [
    'budget' => 70000,
    'odometer' => 0,
    'economical' => false,
    'defective' => false,
];

$newCarsFromDealer = new CarDealership();

/** @var NewCar $vehicle */
foreach ($newCarsFromDealer->getVehicleList() as $vehicle) {
    if (checkIfVehicleIsGood($vehicle, $john) || checkIfVehicleIsGood($vehicle, $zigmas)) {
        $vehicle->setIsSold(true);
    }
}

$usedCars = new UsedCarVendor();

foreach ($usedCars->getVehicleList() as $vehicleUsed) {
    if (checkIfVehicleIsGood($vehicleUsed, $john) || checkIfVehicleIsGood($vehicleUsed, $zigmas)) {
        $vehicle->setIsSold(true);
    }
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

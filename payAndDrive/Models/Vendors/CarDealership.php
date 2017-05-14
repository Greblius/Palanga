<?php

namespace payAndDrive\Models\Vendors;

use payAndDrive\Models\Vehicles\NewCar;

class CarDealership extends VehicleVendor
{
    CONST DEALERSHIP_PRICE_MULTIPLIER = 1.7;

    /** @var NewCar[] */
    private $cars;

    public function __construct()
    {
        $bmw = new NewCar();
        $bmw->setBrand('BMW');
        $bmw->setPrice(50000 * self::DEALERSHIP_PRICE_MULTIPLIER);

        $toyota = new NewCar();
        $toyota->setBrand('Toyota');
        $toyota->setPrice(17000 * self::DEALERSHIP_PRICE_MULTIPLIER);

        $this->cars = [$bmw, $toyota];
    }

    public function getVehicleList()
    {
        return $this->cars;
    }
}

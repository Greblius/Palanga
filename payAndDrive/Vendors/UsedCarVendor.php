<?php

namespace payAndDrive\Vendors;

use payAndDrive\Vehicles\RacingCar;
use payAndDrive\Vehicles\RoadLegalVehicle;
use payAndDrive\Vehicles\SportsVehicle;
use payAndDrive\Vehicles\UsedCar;
use payAndDrive\Vehicles\Vehicle;
use payAndDrive\Vehicles\WaterScooter;

class UsedCarVendor extends VehicleVendor
{
    /** @var  Vehicle[] */
    private $vehicles;

    public function __construct()
    {
        $audi = new UsedCar();
        $audi->setBrand('Audi 100');
        $audi->setPrice(5000);
        $audi->hackCarSystem();

        $this->vehicles[] = $audi;

        $porsche = new RacingCar();
        $porsche->setPrice(100000);
        $porsche->setBrand('Porsche');

        $this->vehicles[] = $porsche;

        $waterScooter = new WaterScooter();
        $waterScooter->setBrand('Bombardier');
        $waterScooter->setPrice(3000);

        $this->vehicles[] = $waterScooter;
    }
}
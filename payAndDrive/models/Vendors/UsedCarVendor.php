<?php

namespace payAndDrive\models\Vendors;

use payAndDrive\models\Vehicles\RacingCar;
use payAndDrive\models\Vehicles\UsedCar;
use payAndDrive\models\Vehicles\Vehicle;
use payAndDrive\models\Vehicles\WaterScooter;

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
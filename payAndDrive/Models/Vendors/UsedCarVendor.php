<?php

namespace payAndDrive\Models\Vendors;

use payAndDrive\Models\Vehicles\RacingCar;
use payAndDrive\Models\Vehicles\UsedCar;
use payAndDrive\Models\Vehicles\Vehicle;
use payAndDrive\Models\Vehicles\WaterScooter;

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

    /**
     * @return string
     */
    public function getSoldCarEventName()
    {
        return 'Used car sold';
    }
}
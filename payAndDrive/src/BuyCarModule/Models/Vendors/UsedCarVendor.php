<?php

namespace payAndDrive\src\BuyCarModule\Models\Vendors;

use payAndDrive\src\BuyCarModule\Events\EventDispatcher;
use payAndDrive\src\BuyCarModule\Models\Vehicles\Vehicle;
use payAndDrive\src\BuyCarModule\Models\Vehicles\VehicleFactory;

class UsedCarVendor extends VehicleVendor
{
    /** @var  Vehicle[] */
    private $vehicles;

    public function __construct(EventDispatcher $eventDispatcher)
    {
        parent::__construct($eventDispatcher);

        $audi = VehicleFactory::create('UsedCar', 'Audi 100', 5000, true);
        $porsche = VehicleFactory::create('RacingCar', 'Porsche', 100000);
        $waterScooter = VehicleFactory::create('WaterScooter', 'Bombardier', 3000);

        $this->vehicles = [$audi, $porsche, $waterScooter];
    }

    /**
     * @return string
     */
    public function getVendorEmail()
    {
        return 'perekupas@gmail.com';
    }
}
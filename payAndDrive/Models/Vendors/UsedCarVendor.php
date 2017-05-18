<?php

namespace payAndDrive\Models\Vendors;

use payAndDrive\Models\Events\EventDispatcher;
use payAndDrive\Models\Vehicles\Vehicle;
use payAndDrive\Models\Vehicles\VehicleFactory;

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
}
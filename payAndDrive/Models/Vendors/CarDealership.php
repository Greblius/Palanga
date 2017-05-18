<?php

namespace payAndDrive\Models\Vendors;

use payAndDrive\Models\Events\EventDispatcher;
use payAndDrive\Models\Vehicles\NewCar;
use payAndDrive\Models\Vehicles\VehicleFactory;

class CarDealership extends VehicleVendor
{
    CONST DEALERSHIP_PRICE_MULTIPLIER = 1.7;

    /** @var NewCar[] */
    private $cars;

    public function __construct(EventDispatcher $eventDispatcher)
    {
        parent::__construct($eventDispatcher);

        $bmw = VehicleFactory::create('NewCar', 'BMW', 50000 * self::DEALERSHIP_PRICE_MULTIPLIER);
        $toyota = VehicleFactory::create('NewCar', 'Toyota', 17000 * self::DEALERSHIP_PRICE_MULTIPLIER);

        $this->cars = [$bmw, $toyota];
    }

    /**
     * @return NewCar[]
     */
    public function getVehicleList()
    {
        return $this->cars;
    }
}

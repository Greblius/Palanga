<?php

namespace payAndDrive\models\Vendors;

use payAndDrive\models\EventManager;
use payAndDrive\models\Vehicles\NewCar;

class CarDealership extends VehicleVendor implements VehicleVendorInterface
{
    CONST DEALERSHIP_PRICE_MULTIPLIER = 1.7;

    /** @var NewCar[] */
    private $cars;

    /** @var EventManager */
    private $event;

    public function __construct(EventManager $event)
    {
        $bmw = new NewCar();
        $bmw->setBrand('BMW');
        $bmw->setPrice(50000 * self::DEALERSHIP_PRICE_MULTIPLIER);

        $toyota = new NewCar();
        $toyota->setBrand('Toyota');
        $toyota->setPrice(17000 * self::DEALERSHIP_PRICE_MULTIPLIER);

        $this->cars = [$bmw, $toyota];

        $this->event = $event;
    }

    public function getVehicleList()
    {
        return $this->cars;
    }

    public function notifyWhenNewVehicleSold()
    {
        $this->event->dispatch($this->getSoldCarEventName());
    }

    public function getSoldCarEventName()
    {
        return 'New car sold';
    }
}

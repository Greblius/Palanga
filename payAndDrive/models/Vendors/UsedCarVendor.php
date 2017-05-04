<?php

namespace payAndDrive\models\Vendors;

use payAndDrive\models\EventManager;
use payAndDrive\models\Vehicles\RacingCar;
use payAndDrive\models\Vehicles\UsedCar;
use payAndDrive\models\Vehicles\Vehicle;
use payAndDrive\models\Vehicles\WaterScooter;

class UsedCarVendor extends VehicleVendor implements VehicleVendorInterface
{
    /** @var  Vehicle[] */
    private $vehicles;

    private $event;

    public function __construct(EventManager $event)
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

        $this->event = $event;
    }

    public function notifyWhenUsedVehicleSold()
    {
        $this->event->dispatch($this->getSoldCarEventName());
    }

    /**
     * @return string
     */
    public function getSoldCarEventName()
    {
        return 'Used car sold';
    }
}
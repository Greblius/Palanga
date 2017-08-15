<?php

namespace payAndDrive\src\BuyCarModule\Models\Vendors;

use payAndDrive\src\BuyCarModule\Events\NewVehicleEvent;
use payAndDrive\src\BuyCarModule\Models\Clients\Client;
use payAndDrive\src\BuyCarModule\Events\EventDispatcher;
use payAndDrive\src\BuyCarModule\Events\SoldCarEvent;
use payAndDrive\src\BuyCarModule\Models\Vehicles\Vehicle;

abstract class VehicleVendor
{
    /** @var  Vehicle[] */
    private $vehicles;

    /** @var  EventDispatcher */
    private $eventDispatcher;

    /** @var  Vehicle */
    private $purchasedVehicle;

    /**
     * VehicleVendor constructor.
     * @param EventDispatcher $eventDispatcher
     */
    public function __construct(EventDispatcher $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @return mixed
     */
    public function getVehicleList()
    {
        return $this->vehicles;
    }

    /**
     * @param Vehicle $vehicle
     */
    public function sellVehicle(Vehicle $vehicle)
    {
        $vehicle->setIsSold(true);
    }

    /**
     * @param Vehicle $vehicle
     * @param Client $client
     * @return bool
     */
    public function checkIfVehicleIsGood($vehicle, $client)
    {
        $good = false;

        if (!$vehicle->isSold() && $client->getBudget() >= $vehicle->getPrice()
            && $client->getCarRequirements()->isEconomical() === $vehicle->isEconomical()
            && $client->getCarRequirements()->isDefective() === $vehicle->isDefective()) {
            $good = true;
        }

        return $good;
    }

    /**
     * @return array
     */
    public function getPurchasedVehicleData()
    {
        $vehicleData = [];

        if (null !== $this->purchasedVehicle) {
            $vehicleData = [
                'brand' => $this->purchasedVehicle->getBrand(),
                'price' => $this->purchasedVehicle->getPrice(),
                'milage' => $this->purchasedVehicle->getOdometerValue()
            ];
        }

        return $vehicleData;
    }

    /**
     * @param Vehicle $vehicle
     * @param Client $client
     */
    public function setPurchasedVehicle(Vehicle $vehicle, Client $client)
    {
        $this->purchasedVehicle = $vehicle;
        $event = new SoldCarEvent($vehicle->getBrand(), $vehicle->getPrice(), $client->getEmail(), $client->getName());
        $this->eventDispatcher->dispatch('informClientAboutNewCar', $event);
    }

    /**
     * @return string
     */
    public function getVendorEmail()
    {
        return '';
    }

    public function saveNewVehicle(Vehicle $vehicle)
    {
        $event = new NewVehicleEvent($vehicle, $this->getVendorEmail());
        $this->eventDispatcher->dispatch('informVendorAboutNewVehicle', $event);
    }
}
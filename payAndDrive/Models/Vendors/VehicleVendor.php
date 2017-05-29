<?php

namespace payAndDrive\Models\Vendors;

use payAndDrive\Models\Clients\Client;
use payAndDrive\Models\Events\ClientBoughtCarEvent;
use payAndDrive\Models\Events\EventDispatcher;
use payAndDrive\Models\Vehicles\Vehicle;

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
            && $client->getCarRequirements()->isDefective() === $vehicle->isDefective() && !$client->isHasCar()) {
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
     */
    public function setPurchasedVehicle(Vehicle $vehicle)
    {
        $this->purchasedVehicle = $vehicle;
    }

    /**
     * @param Client $client
     * @param Vehicle $vehicle
     */
    public function informClientAboutPurchase(Client $client, Vehicle $vehicle)
    {
        $this->eventDispatcher->dispatch(
            'informClientAboutPurchasedCar',
            new ClientBoughtCarEvent($client->getName(), $client->getEmail(), $vehicle->getBrand())
        );
    }
}
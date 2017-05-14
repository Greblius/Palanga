<?php

namespace payAndDrive\Controllers;

use payAndDrive\Models\Clients\Client;
use payAndDrive\Models\Clients\ClientManager;
use payAndDrive\Models\Clients\ClientRequirements;
use payAndDrive\Models\Events\ClientBoughtCarEvent;
use payAndDrive\Models\Events\EventDispatcher;
use payAndDrive\Models\Events\SoldCarEvent;
use payAndDrive\Models\Vehicles\Vehicle;
use payAndDrive\Models\Vendors\CarDealership;
use payAndDrive\Models\Vendors\UsedCarVendor;
use payAndDrive\Models\Vendors\VehicleVendor;

class CarSelectorController
{
    /** @var  EventDispatcher */
    private $eventDispatcher;

    /** @var  ClientManager */
    private $clientManager;

    /** @var  CarDealership */
    private $newCarsDealer;

    /** @var  UsedCarVendor */
    private $usedCarVendor;

    public function __construct()
    {
        $this->eventDispatcher = new EventDispatcher();
        $this->clientManager = $this->getClientManager();
        $this->newCarsDealer = new CarDealership();
        $this->usedCarVendor = new UsedCarVendor();
    }

    public function getRightCarsForUser()
    {
        $foundCarData = $this->selectCarFromList($this->newCarsDealer);

        if (empty($foundCarData)) {
            $foundCarData = $this->selectCarFromList($this->usedCarVendor);
        }

        $this->eventDispatcher->dispatch('carSold');
        $this->eventDispatcher->dispatch('newClientCar');

        return ['selectedCarData' => $foundCarData];
    }

    /**
     * @param Vehicle $vehicle
     * @return array
     */
    private function getCarData($vehicle)
    {
        return [
            'brand' => $vehicle->getBrand(),
            'price' => $vehicle->getPrice(),
            'milage' => $vehicle->getOdometerValue()
        ];
    }

    /**
     * @param VehicleVendor|VehicleVendorInterface $dealer
     * @param $clientData
     * @param EventManager $eventManager
     * @return array
     */
    private function selectCarFromList($dealer)
    {
        $foundCarData = [];
        foreach ($dealer->getVehicleList() as $vehicle) {
            /** @var Client $client */
            foreach ($this->clientManager->getClients() as $client) {
                if ($dealer->checkIfVehicleIsGood($vehicle, $client)) {
                    $foundCarData = $this->getCarData($vehicle);
                    $vehicle->setIsSold(true);
                    $client->setHasCar(true);

                    $this->soldCarListener($vehicle);
                    $this->informClientListener($client, $vehicle);
                }
            }
        }
        return $foundCarData;
    }

    /**
     * @param Client $client
     * @param Vehicle $vehicle
     */
    private function informClientListener(Client $client, Vehicle $vehicle)
    {
        $newCarInformEvent = new ClientBoughtCarEvent($client->getName(), $client->getEmail(), $vehicle->getBrand());
        $this->eventDispatcher->addListener($newCarInformEvent, 'informClientAboutPurchasedCar', 'newClientCar');
    }

    /**
     * @param Vehicle $vehicle
     */
    private function soldCarListener(Vehicle $vehicle)
    {
        $carSoldEvent = new SoldCarEvent($vehicle->getBrand(), $vehicle->getPrice());
        $this->eventDispatcher->addListener($carSoldEvent, 'informAboutSoldCar', 'carSold');
    }

    /**
     * @return ClientManager
     */
    private function getClientManager()
    {
        $clientCollection = new ClientManager();

        $clientJonas = new Client('1', 'Jonas', 'jonas@gmail.com', 70000);
        $jonasRequires = new ClientRequirements('1', 0, false, false);
        $clientJonas->setCarRequirements($jonasRequires);
        $clientPetras = new Client('2', 'Petras', 'jonas@gmail.com', 10000);
        $petrasRequires = new ClientRequirements('2', 100000, true, true);
        $clientPetras->setCarRequirements($petrasRequires);

        $clientCollection->addClient($clientJonas);
        $clientCollection->addClient($clientPetras);

        return $clientCollection;
    }
}

<?php

namespace payAndDrive\controllers;

use payAndDrive\models\Clients\Client;
use payAndDrive\models\Clients\ClientManager;
use payAndDrive\models\EventManager;
use payAndDrive\models\Vehicles\Vehicle;
use payAndDrive\models\Vendors\CarDealership;
use payAndDrive\models\Vendors\UsedCarVendor;
use payAndDrive\models\Vendors\VehicleVendor;
use payAndDrive\models\Vendors\VehicleVendorInterface;

class CarSelectorController
{
    public function getRightCarsForUser()
    {
        $eventManager = new EventManager();

        $clientManager = $this->getClientManager($eventManager);

        $newCarsFromDealer = new CarDealership($eventManager);
        $usedCarVendor = new UsedCarVendor($eventManager);

        $foundCarData = $this->selectCarFromList($newCarsFromDealer, $clientManager->getClients(), $eventManager);

        if (empty($foundCarData)) {
            $foundCarData = $this->selectCarFromList($usedCarVendor, $clientManager->getClients(), $eventManager);
        }

        $newCarsFromDealer->notifyWhenNewVehicleSold();
        $usedCarVendor->notifyWhenUsedVehicleSold();

        $clientManager->notifyClientsWhoBoughtCars();


        return ['selectedCarData' => $foundCarData];
    }

    /**
     * @param $vehicle
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
    private function selectCarFromList($dealer, $clientData, $eventManager)
    {
        $foundCarData = [];
        foreach ($dealer->getVehicleList() as $vehicle) {
            /** @var Client $client */
            foreach ($clientData as $client) {
                if ($dealer->checkIfVehicleIsGood($vehicle, $client)) {
                    $foundCarData = $this->getCarData($vehicle);
                    $vehicle->setIsSold(true);
                    $client->setHasCar(true);

                    $this->soldCarListener($dealer, $eventManager);
                    $this->informClientListener($eventManager);
                }
            }
        }
        return $foundCarData;
    }

    /**
     * @param $eventManager
     * @return ClientManager
     */
    private function getClientManager($eventManager)
    {
        $clientCollection = new ClientManager($eventManager);

        $clientJonas = new Client('Jonas', 'jonas@gmail.com', 70000, 0, false, false);
        $clientPetras = new Client('Petras', 'jonas@gmail.com', 10000, 100000, true, true);

        $clientCollection->addClient($clientJonas);
        $clientCollection->addClient($clientPetras);

        return $clientCollection;
    }

    /**
     * @param EventManager $eventManager
     */
    private function informClientListener($eventManager)
    {
        $eventManager->listen('Client bought car', function (Client $client, Vehicle $vehicle) {
            mail(
                $client->getEmail(),
                'Congratulations ' . $client->getName() . ' you have bought yourself a ' . $vehicle->getBrand() . '!!!',
                ''
            );
        });
    }

    /**
     * @param $dealer
     * @param EventManager $eventManager
     */
    private function soldCarListener($dealer, $eventManager)
    {
        $eventManager->listen($dealer->getSoldCarEventName(), function ($foundCarData) {
            echo 'Car brand: ' . $foundCarData['brand'] . ' sold for: ' . $foundCarData['price'];
        });
    }
}

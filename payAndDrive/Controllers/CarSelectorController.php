<?php

namespace payAndDrive\Controllers;

use payAndDrive\Models\Clients\Client;
use payAndDrive\Models\Clients\ClientFactory;
use payAndDrive\Models\Clients\ClientManager;
use payAndDrive\Models\Commands\SellCarCommand;
use payAndDrive\Models\Commands\VendorCommandBus;
use payAndDrive\Models\Events\EventDispatcher;
use payAndDrive\Models\Handlers\SoldCarHandler;
use payAndDrive\Models\Tactician\Extractor\CommandClassNameExtractor;
use payAndDrive\Models\Tactician\Inflector\HandlerInflector;
use payAndDrive\Models\Tactician\Locator\HandlerLocator;
use payAndDrive\Models\Tactician\TacticianHandleBox;
use payAndDrive\Models\Vehicles\Vehicle;
use payAndDrive\Models\Vendors\CarDealership;
use payAndDrive\Models\Vendors\UsedCarVendor;
use payAndDrive\Models\Vendors\VehicleVendor;

class CarSelectorController
{
    /** @var  ClientManager */
    private $clientManager;

    /** @var  CarDealership */
    private $newCarsDealer;

    /** @var  UsedCarVendor */
    private $usedCarVendor;

    public function __construct()
    {
        $eventDispatcher = new EventDispatcher();
        $this->clientManager = $this->getClientManager();
        $this->newCarsDealer = new CarDealership($eventDispatcher);
        $this->usedCarVendor = new UsedCarVendor($eventDispatcher);
    }

    public function getRightCarsForUser()
    {
        $foundCarData = $this->selectCarFromList($this->newCarsDealer);

        if (empty($foundCarData)) {
            $foundCarData = $this->selectCarFromList($this->usedCarVendor);
        }

        return ['selectedCarData' => $foundCarData];
    }

    /**
     * @param VehicleVendor $dealer
     * @return array
     */
    private function selectCarFromList($dealer)
    {
        $foundCarData = [];

        $locator = new HandlerLocator();
        $locator->addHandler(new SoldCarHandler(), 'SellCarCommand');
        $tacticianPackage = new TacticianHandleBox(new CommandClassNameExtractor(), $locator, new HandlerInflector());
        $commandBus = new VendorCommandBus($tacticianPackage);

        /** @var Vehicle $vehicle */
        foreach ($dealer->getVehicleList() as $vehicle) {
            /** @var Client $client */
            foreach ($this->clientManager->getClients() as $client) {
                if ($dealer->checkIfVehicleIsGood($vehicle, $client)) {
                    $commandBus->dispatch(new SellCarCommand($dealer, $client, $vehicle));
                    $foundCarData = $dealer->getPurchasedVehicleData();
                }
            }
        }

        return $foundCarData;
    }

    /**
     * @return ClientManager
     */
    private function getClientManager()
    {
        $clientCollection = new ClientManager();

        $clientJonas = ClientFactory::create('1', 'Jonas', 'jonas@gmail.com', 70000, 0, false, false);
        $clientPetras = ClientFactory::create('2', 'Petras', 'jonas@gmail.com', 10000, 100000, true, true);

        $clientCollection->addClient($clientJonas);
        $clientCollection->addClient($clientPetras);

        return $clientCollection;
    }
}

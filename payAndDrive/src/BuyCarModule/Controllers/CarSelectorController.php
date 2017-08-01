<?php

namespace payAndDrive\Controllers;

use payAndDrive\src\BuyCarModule\Controllers\CommandBusTrait;
use payAndDrive\src\BuyCarModule\Handlers\OperationHandler;
use payAndDrive\src\BuyCarModule\Models\Clients\Client;
use payAndDrive\src\BuyCarModule\Models\Clients\ClientManager;
use payAndDrive\src\BuyCarModule\Commands\SellCarCommand;
use payAndDrive\src\BuyCarModule\Events\EventDispatcher;
use payAndDrive\src\BuyCarModule\Models\Vehicles\Vehicle;
use payAndDrive\src\BuyCarModule\Models\Vendors\CarDealership;
use payAndDrive\src\BuyCarModule\Models\Vendors\UsedCarVendor;
use payAndDrive\src\BuyCarModule\Models\Vendors\VehicleVendor;

class CarSelectorController
{
    use CommandBusTrait;

    /** @var  ClientManager */
    private $clientManager;

    /** @var  CarDealership */
    private $newCarsDealer;

    /** @var  UsedCarVendor */
    private $usedCarVendor;

    public function __construct()
    {
        $eventDispatcher = new EventDispatcher();
        $this->clientManager = $this->getClientManager($eventDispatcher);
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

        $this->addNewHandlerForCommandBus(new OperationHandler(), 'SellCarCommand');
        $commandBus = $this->getCommandBus();

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
     * @param EventDispatcher $eventDispatcher
     * @return ClientManager
     */
    private function getClientManager(EventDispatcher $eventDispatcher)
    {
        $clientCollection = new ClientManager($eventDispatcher);
        $clientCollection->loadClients();
        return $clientCollection;
    }
}

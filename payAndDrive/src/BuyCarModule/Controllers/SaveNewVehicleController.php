<?php

namespace payAndDrive\Controllers;

use payAndDrive\src\BuyCarModule\Commands\SaveNewVehicleCommand;
use payAndDrive\src\BuyCarModule\Controllers\CommandBusTrait;
use payAndDrive\src\BuyCarModule\Events\EventDispatcher;
use payAndDrive\src\BuyCarModule\Handlers\OperationHandler;
use payAndDrive\src\BuyCarModule\Models\Vehicles\VehicleManager;

class SaveNewVehicleController
{
    use CommandBusTrait;

    /** @var  EventDispatcher */
    private $eventDispatcher;

    public function __construct()
    {
        $this->eventDispatcher = new EventDispatcher();
    }

    public function saveNewVehicle($carData)
    {
        $vehicleManager = new VehicleManager($this->eventDispatcher);

        $this->addNewHandlerForCommandBus(new OperationHandler(), 'SaveNewVehicleCommand');
        $this->getCommandBus()->dispatch(new SaveNewVehicleCommand($vehicleManager, $carData));
    }
}
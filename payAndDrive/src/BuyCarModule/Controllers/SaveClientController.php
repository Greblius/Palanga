<?php

namespace payAndDrive\Controllers;

use payAndDrive\src\BuyCarModule\Commands\CreateClientCommand;
use payAndDrive\src\BuyCarModule\Controllers\CommandBusTrait;
use payAndDrive\src\BuyCarModule\Events\EventDispatcher;
use payAndDrive\src\BuyCarModule\Handlers\OperationHandler;
use payAndDrive\src\BuyCarModule\Models\Clients\ClientManager;

class SaveClientController
{
    use CommandBusTrait;

    /** @var  ClientManager */
    private $clientManager;

    public function __construct()
    {
        $this->clientManager = new ClientManager(new EventDispatcher());
    }

    public function createClient($clientData)
    {
        $this->addNewHandlerForCommandBus(new OperationHandler(), 'CreateClientCommand');
        $this->getCommandBus()->dispatch(new CreateClientCommand($this->clientManager, $clientData));
    }
}
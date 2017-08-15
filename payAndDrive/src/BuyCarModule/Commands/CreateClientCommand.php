<?php

namespace payAndDrive\src\BuyCarModule\Commands;

use payAndDrive\src\BuyCarModule\Models\Clients\ClientFactory;
use payAndDrive\src\BuyCarModule\Models\Clients\ClientManager;

class CreateClientCommand implements Command
{
    /** @var  ClientManager */
    private $clientManager;

    /** @var  array */
    private $clientData;

    /**
     * CreateClientCommand constructor.
     * @param ClientManager $clientManager
     * @param array $clientData
     */
    public function __construct(ClientManager $clientManager, $clientData)
    {
        $this->clientManager = $clientManager;
        $this->clientData = $clientData;
    }

    public function execute()
    {
        $client = ClientFactory::create(
            $this->clientData['clientName'],
            $this->clientData['clientEmail'],
            $this->clientData['budget'],
            $this->clientData['odometerValue'],
            $this->clientData['defective'],
            $this->clientData['economical']
        );

        $this->clientManager->addClient($client);
    }
}
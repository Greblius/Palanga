<?php

namespace payAndDrive\src\BuyCarModule\Models\Clients;

use payAndDrive\src\BuyCarModule\Events\EventDispatcher;
use payAndDrive\src\BuyCarModule\Events\NewClientEvent;

class ClientManager
{
    /** @var  Client[] */
    private $clients;

    /** @var  EventDispatcher */
    private $eventDispatcher;

    /**
     * ClientManager constructor.
     * @param EventDispatcher $eventDispatcher
     */
    public function __construct(EventDispatcher $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param Client $client
     */
    public function addClient($client)
    {
        $this->clients[] = $client;
        $event = new NewClientEvent($client->getEmail(), $client->getName());
        $this->eventDispatcher->dispatch('greetNewClient', $event);
    }

    public function getClients()
    {
        return $this->clients;
    }

    public function loadClients()
    {
        //cia uzkraunu $this->clients is DB
    }
}
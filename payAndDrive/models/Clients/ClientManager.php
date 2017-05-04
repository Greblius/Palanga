<?php

namespace payAndDrive\models\Clients;

use payAndDrive\models\EventManager;

class ClientManager
{
    /** @var  EventManager */
    private $event;

    /** @var  Client[] */
    private $clients;

    public function __construct(EventManager $eventManager)
    {
        $this->event = $eventManager;
    }

    /**
     * @param Client $client
     */
    public function addClient($client)
    {
        $this->clients[] = $client;
    }

    public function getClients()
    {
        return $this->clients;
    }

    public function notifyClientsWhoBoughtCars()
    {
        $this->event->dispatch('Client bought car');
    }
}
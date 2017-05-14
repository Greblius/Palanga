<?php

namespace payAndDrive\Models\Clients;

class ClientManager
{
    /** @var  Client[] */
    private $clients;

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
}
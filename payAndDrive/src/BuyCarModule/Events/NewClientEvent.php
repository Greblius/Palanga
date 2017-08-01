<?php

namespace payAndDrive\src\BuyCarModule\Events;

class NewClientEvent
{
    /** @var  string */
    private $clientName;

    /** @var  string */
    private $clientEmail;

    public function __construct($clientEmail, $clientName)
    {
        $this->clientEmail = $clientEmail;
        $this->clientName = $clientName;
    }

    /**
     * @return string
     */
    public function getClientName()
    {
        return $this->clientName;
    }

    /**
     * @return string
     */
    public function getClientEmail()
    {
        return $this->clientEmail;
    }
}

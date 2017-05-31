<?php

namespace payAndDrive\Models\Events;

class SoldCarEvent
{
    /** @var  string */
    private $carBrand;

    /** @var  float */
    private $carPrice;

    /** @var  string */
    private $clientName;

    /** @var  string */
    private $clientEmail;

    /**
     * @return string
     */
    public function getCarBrand()
    {
        return $this->carBrand;
    }

    /**
     * @return float
     */
    public function getCarPrice()
    {
        return $this->carPrice;
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

    public function __construct($carBrand, $carPrice, $clientName, $clientEmail)
    {
        $this->carBrand = $carBrand;
        $this->carPrice = $carPrice;
        $this->clientName = $clientName;
        $this->clientEmail = $clientEmail;
    }

}

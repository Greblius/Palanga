<?php

namespace payAndDrive\Models\Vehicles;

use payAndDrive\Models\Clients\Client;
use payAndDrive\Models\Events\ClientBoughtCarEvent;
use payAndDrive\Models\Events\EventDispatcher;
use payAndDrive\Models\Events\SoldCarEvent;

abstract class Vehicle implements VehicleProperties
{
    /** @var  boolean */
    private $sold;

    /** @var  EventDispatcher */
    private $eventDispatcher;

    /** @var  string */
    private $brand;

    /** @var  float */
    private $price;

    /** @var  string */
    private $ownerId;

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function __construct()
    {
        $this->eventDispatcher = new EventDispatcher();
    }

    /**
     * @return bool
     */
    public function isSold()
    {
        $sold = false;

        if (null !== $this->sold) {
            $sold = $this->sold;
        }

        return $sold;
    }

    /**
     * @param Client $client
     */
    public function setIsSold($client)
    {
        $this->ownerId = $client->getId();
        $this->eventDispatcher->dispatch('informAboutSoldCar', new SoldCarEvent($this->getBrand(), $this->getPrice()));
        $this->eventDispatcher->dispatch('informClientAboutPurchasedCar', new ClientBoughtCarEvent($client->getName(), $client->getEmail(), $this->getBrand()));
        $this->sold = true;
    }

    /**
     * @param Client $client
     * @param Vehicle $vehicle
     */
    public function informClientAboutPurchase(Client $client, Vehicle $vehicle)
    {

    }
}

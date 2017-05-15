<?php

namespace payAndDrive\Models\Vehicles;

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
     * @param bool $sold
     */
    public function setIsSold($sold)
    {
        $this->eventDispatcher->dispatch('informAboutSoldCar', new SoldCarEvent($this->getBrand(), $this->getPrice()));
        $this->sold = $sold;
    }
}

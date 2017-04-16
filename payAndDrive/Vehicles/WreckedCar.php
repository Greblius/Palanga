<?php

namespace payAndDrive\Vehicles;

class WreckedCar implements Vehicle, RoadLegalVehicle
{
    /** @var string */
    private $brand;

    /** @var  float */
    private $price;

    /** @var  boolean */
    private $sold;

    /**
     * @return bool
     */
    public function isNewVehicle()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isDefective()
    {
        return true;
    }

    /**
     * @return int
     */
    public function getOdometerValue()
    {
        return 10000;
    }

    /**
     * @return bool
     */
    public function isEconomical()
    {
        return false;
    }

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
     * @param $sold
     */
    public function setIsSold($sold)
    {
        $this->sold = $sold;
    }
}

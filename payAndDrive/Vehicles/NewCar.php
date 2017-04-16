<?php

namespace payAndDrive\Vehicles;

class NewCar implements Vehicle, RoadLegalVehicle
{
    /** @var  string */
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
        return true;
    }

    /**
     * @return bool
     */
    public function isDefective()
    {
        return false;
    }

    /**
     * @return int
     */
    public function getOdometerValue()
    {
        return 0;
    }

    /**
     * @return bool
     */
    public function isEconomical()
    {
        return true;
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

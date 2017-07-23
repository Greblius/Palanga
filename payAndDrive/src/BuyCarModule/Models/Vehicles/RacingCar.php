<?php

namespace payAndDrive\src\BuyCarModule\Models\Vehicles;

class RacingCar extends Vehicle implements SportsVehicle
{
    /** @var string */
    private $brand;

    /** @var float */
    private $price;

    /**
     * @return int
     */
    public function getMotoHours()
    {
        return 100;
    }

    /**
     * @return bool
     */
    public function isExtendedSafety()
    {
        return true;
    }

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
        return false;
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
}

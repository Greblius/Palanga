<?php

namespace payAndDrive\models\Vehicles;

class UsedCar implements Vehicle, RoadLegalVehicle
{
    /** @var string */
    private $brand;

    /** @var float */
    private $price;

    /** @var boolean */
    private $sold;

    /** @var boolean */
    private $hack;

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
        $defective = true;

        if ($this->hack) {
            $defective = false;
        }

        return $defective;
    }

    /**
     * @return int
     */
    public function getOdometerValue()
    {
        $odometerValue = 200000;
        if ($this->hack) {
            $odometerValue = 200000 * 0.5;
        }
        return $odometerValue;
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

    public function hackCarSystem()
    {
        $this->hack = true;
    }
}

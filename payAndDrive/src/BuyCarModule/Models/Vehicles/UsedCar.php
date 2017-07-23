<?php

namespace payAndDrive\src\BuyCarModule\Models\Vehicles;

class UsedCar extends Vehicle implements RoadLegalVehicle
{
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

    public function hackCarSystem()
    {
        $this->hack = true;
    }
}

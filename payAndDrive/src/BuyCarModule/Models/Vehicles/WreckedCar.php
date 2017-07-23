<?php

namespace payAndDrive\src\BuyCarModule\Models\Vehicles;

class WreckedCar extends Vehicle implements RoadLegalVehicle
{
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
}

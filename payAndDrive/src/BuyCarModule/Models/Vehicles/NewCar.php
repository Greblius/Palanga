<?php

namespace payAndDrive\src\BuyCarModule\Models\Vehicles;

class NewCar extends Vehicle implements RoadLegalVehicle
{
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
}

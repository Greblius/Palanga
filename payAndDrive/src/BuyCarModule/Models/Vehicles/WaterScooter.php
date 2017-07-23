<?php

namespace payAndDrive\src\BuyCarModule\Models\Vehicles;

class WaterScooter extends Vehicle implements SportsVehicle
{
    /**
     * @return int
     */
    public function getMotoHours()
    {
        return 200;
    }

    /**
     * @return bool
     */
    public function isExtendedSafety()
    {
        return false;
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
}

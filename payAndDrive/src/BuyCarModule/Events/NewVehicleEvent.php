<?php

namespace payAndDrive\src\BuyCarModule\Events;

use payAndDrive\src\BuyCarModule\Models\Vehicles\Vehicle;

class NewVehicleEvent
{
    /** @var  Vehicle */
    private $vehicle;

    /** @var  string */
    private $vendorEmail;

    /**
     * NewVehicleEvent constructor.
     * @param Vehicle $vehicle
     * @param string $vendorEmail
     */
    public function __construct(Vehicle $vehicle, $vendorEmail)
    {
        $this->vehicle = $vehicle;
        $this->vendorEmail = $vendorEmail;
    }

    /**
     * @return string
     */
    public function getVendorEmail()
    {
        return $this->vendorEmail;
    }

    /**
     * @return Vehicle
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }
}
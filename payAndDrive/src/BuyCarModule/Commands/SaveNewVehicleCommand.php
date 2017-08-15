<?php

namespace payAndDrive\src\BuyCarModule\Commands;

use payAndDrive\src\BuyCarModule\Models\Vehicles\VehicleFactory;
use payAndDrive\src\BuyCarModule\Models\Vehicles\VehicleManager;
use payAndDrive\src\BuyCarModule\Models\Vendors\VendorSelector;

class SaveNewVehicleCommand implements Command
{
    /** @var  array */
    private $carData;

    /** @var  VehicleManager */
    private $vehicleManager;

    /**
     * SaveNewVehicleCommand constructor.
     * @param VehicleManager $vehicleManager
     * @param array $carData
     */
    public function __construct($vehicleManager, $carData)
    {
        $this->carData = $carData;
        $this->vehicleManager = $vehicleManager;
    }

    public function execute()
    {
        $vehicle = VehicleFactory::create(
            $this->carData['carType'],
            $this->carData['brand'],
            $this->carData['price']
        );

        $vehicleVendor = VendorSelector::getVehicleVendor($this->carData['carType']);

        $this->vehicleManager->addNewVehicle($vehicle, $vehicleVendor->getVendorEmail());
    }
}
<?php

namespace payAndDrive\controllers;

use payAndDrive\models\Vendors\CarDealership;
use payAndDrive\models\Vendors\UsedCarVendor;

class CarSelectorController
{
    public function getRightCarsForUser()
    {
        $clientData = $this->getClientDataFromFormSubmit();
        $newCarsFromDealer = new CarDealership();

        $foundCarData = $this->selectCarFromList($newCarsFromDealer, $clientData);

        if (empty($foundCarData)) {
            $usedCarVendor = new UsedCarVendor();
            $foundCarData = $this->selectCarFromList($usedCarVendor, $clientData);
        }

        return ['selectedCarData' => $foundCarData];
    }

    /**
     * @return array
     */
    private function getClientDataFromFormSubmit()
    {
        return [
            'budget' => 70000,
            'odometer' => 0,
            'economical' => false,
            'defective' => false,
        ];
    }

    /**
     * @param $vehicle
     * @return array
     */
    private function getCarData($vehicle)
    {
        return [
            'brand' => $vehicle->getBrand(),
            'price' => $vehicle->getPrice(),
            'milage' => $vehicle->getOdometerValue()
        ];
    }

    /**
     * @param $newCarsFromDealer
     * @param $clientData
     * @return array
     */
    private function selectCarFromList($newCarsFromDealer, $clientData)
    {
        $foundCarData = [];
        foreach ($newCarsFromDealer->getVehicleList() as $vehicle) {
            if ($newCarsFromDealer->checkIfVehicleIsGood($vehicle, $clientData)) {
                $foundCarData = $this->getCarData($vehicle);
                $vehicle->setIsSold(true);
            }
        }
        return $foundCarData;
    }
}

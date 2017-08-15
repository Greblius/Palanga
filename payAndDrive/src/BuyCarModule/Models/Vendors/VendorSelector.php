<?php

namespace payAndDrive\src\BuyCarModule\Models\Vendors;

class VendorSelector
{
    private static $vendorMap = [
        'newCar' => CarDealership::class,
        'racingCar' => UsedCarVendor::class,
        'usedCar' => UsedCarVendor::class,
        'scooter' => UsedCarVendor::class,
        'wreck' => UsedCarVendor::class
    ];

    /**
     * @param array $carType
     * @return VehicleVendor|null
     */
    public static function getVehicleVendor($carType)
    {
        $vendor = null;

        if (isset(self::$vendorMap[$carType])) {
            $vendor = new self::$vendorMap[$carType];
        }

        return $vendor;
    }
}
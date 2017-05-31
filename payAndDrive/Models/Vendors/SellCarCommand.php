<?php

namespace payAndDrive\Models\Vendors;

use payAndDrive\Models\Clients\Client;
use payAndDrive\Models\Vehicles\Vehicle;

class SellCarCommand implements VendorCommand
{
    /** @var  VehicleVendor */
    private $dealer;

    /** @var  Client */
    private $client;

    /** @var  Vehicle */
    private $vehicle;

    public function __construct(VehicleVendor $dealer, Client $client, Vehicle $vehicle)
    {
        $this->dealer = $dealer;
        $this->client = $client;
        $this->vehicle = $vehicle;
    }

    public function execute()
    {
        $this->dealer->setPurchasedVehicle($this->vehicle, $this->client);
        $this->vehicle->setIsSold($this->client);
    }
}

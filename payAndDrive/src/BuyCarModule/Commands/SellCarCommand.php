<?php

namespace payAndDrive\src\BuyCarModule\Commands;

use payAndDrive\src\BuyCarModule\Models\Clients\Client;
use payAndDrive\src\BuyCarModule\Models\Vehicles\Vehicle;
use payAndDrive\src\BuyCarModule\Models\Vendors\VehicleVendor;

class SellCarCommand implements Command
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

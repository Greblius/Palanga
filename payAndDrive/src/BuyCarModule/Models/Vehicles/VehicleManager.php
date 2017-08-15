<?php

namespace payAndDrive\src\BuyCarModule\Models\Vehicles;

use payAndDrive\src\BuyCarModule\Events\EventDispatcher;
use payAndDrive\src\BuyCarModule\Events\NewVehicleEvent;

class VehicleManager
{
    /** @var  EventDispatcher */
    private $eventDispatcher;

    /**
     * ClientManager constructor.
     * @param EventDispatcher $eventDispatcher
     */
    public function __construct(EventDispatcher $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    public function addNewVehicle($vehicle, $vendorEmail)
    {
        $event = new NewVehicleEvent($vehicle, $vendorEmail);
        $this->eventDispatcher->dispatch('informVendorAboutNewVehicle', $event);
    }
}
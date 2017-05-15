<?php

namespace payAndDrive\Models\Vehicles;

interface VehicleProperties
{
    public function isNewVehicle();

    public function isDefective();

    public function isEconomical();
}
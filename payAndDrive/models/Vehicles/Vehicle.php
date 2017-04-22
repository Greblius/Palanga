<?php

namespace payAndDrive\models\Vehicles;

interface Vehicle
{
    public function isNewVehicle();

    public function isDefective();

    public function isEconomical();

    public function getPrice();

    public function getBrand();

    public function setBrand($brand);

    public function setPrice($price);

    public function isSold();

    public function setIsSold($sold);
}
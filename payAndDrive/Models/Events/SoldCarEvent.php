<?php

namespace payAndDrive\Models\Events;

class SoldCarEvent extends Event
{
    /** @var  string */
    private $carBrand;

    /** @var  float */
    private $carPrice;

    public function __construct($carBrand, $carPrice)
    {
        $this->carBrand = $carBrand;
        $this->carPrice = $carPrice;
    }

    public function informAboutSoldCar()
    {
        echo 'Car brand: ' . $this->carBrand . ' sold for: ' . $this->carPrice;
    }
}
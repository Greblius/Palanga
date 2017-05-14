<?php

namespace payAndDrive\Models\Events;

class ClientBoughtCarEvent extends Event
{
    /** @var  string */
    private $clientName;

    /** @var  string */
    private $clientEmail;

    /** @var  string */
    private $vehicleBrand;

    public function __construct($clientName, $clientEmail, $vehileBrand)
    {
        $this->clientName = $clientName;
        $this->clientEmail = $clientEmail;
        $this->vehicleBrand = $vehileBrand;
    }


    public function informClientAboutPurchasedCar()
    {
        mail(
            $this->clientEmail,
            'Congratulations ' . $this->clientName . ' you have bought yourself a ' . $this->vehicleBrand . '!!!',
            ''
        );
    }
}
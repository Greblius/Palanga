<?php

namespace payAndDrive\src\BuyCarModule\Events;

class EventDispatcher
{
    public function dispatch($functionName, $event)
    {
        $this->{$functionName}($event);
    }

    /**
     * @param SoldCarEvent $event
     */
    public function informClientAboutNewCar(SoldCarEvent $event)
    {
        mail(
            $event->getClientEmail(),
            'Congratulations ' . $event->getClientName() . ' you have bought yourself a ' . $event->getCarBrand() . '!!!',
            ''
        );
    }

    /**
     * @param NewClientEvent $event
     */
    public function greetNewClient(NewClientEvent $event)
    {
        mail($event->getClientEmail(), 'Hello '. $event->getClientName() .', Thank you for joining best PEREKUP website!', '');
    }

    /**
     * @param NewVehicleEvent $event
     */
    public function informVendorAboutNewVehicle(NewVehicleEvent $event)
    {
        mail($event->getVendorEmail(), 'New car arrived to garage: ' . $event->getVehicle()->getBrand() . ' sold for: ' . $event->getVehicle()->getPrice(), '');
    }
}

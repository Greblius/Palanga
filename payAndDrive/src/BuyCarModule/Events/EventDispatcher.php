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
}

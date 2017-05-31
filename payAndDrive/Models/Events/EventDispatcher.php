<?php

namespace payAndDrive\Models\Events;

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
}

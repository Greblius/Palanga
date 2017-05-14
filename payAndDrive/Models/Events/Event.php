<?php

namespace payAndDrive\Models\Events;

abstract class Event
{
    /** @var  string */
    private $eventName;

    public function getEventName()
    {
        return $this->eventName;
    }
}
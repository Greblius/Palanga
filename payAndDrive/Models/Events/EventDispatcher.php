<?php

namespace payAndDrive\Models\Events;

class EventDispatcher
{
    /**
     * @param $eventName
     * @param Event $event
     */
    public function dispatch($eventName, Event $event)
    {
        $event->{$eventName};
    }
}
<?php

namespace payAndDrive\Models\Events;

class EventDispatcher
{
    /** @var  Event[] */
    private $events;

    public function addListener(Event $event, $functionName, $listenerName)
    {
        $this->events[$listenerName] = [$event, $functionName];
    }

    /**
     * @param string $eventName
     */
    public function dispatch($eventName)
    {
        foreach ($this->events as $listenerName => $listener) {
            if ($listenerName === $eventName) {
                $listener[0]->{$listener[1]};
            }
        }
    }
}
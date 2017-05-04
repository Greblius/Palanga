<?php

namespace payAndDrive\models;

class EventManager
{
    /** @var array */
    private $listeners = [];

    /**
     * @param $event
     * @param $callback
     */
    public function listen($event, $callback)
    {
        $this->listeners[$event][] = $callback;
    }

    public function dispatch($event)
    {
        foreach ($this->listeners[$event] as $listener) {
            call_user_func($listener);
        }
    }
}
<?php

namespace payAndDrive\src\BuyCarModule\Commands;

interface CommandBus
{
    /**
     * @param Command $command
     */
    public function dispatch(Command $command);
}

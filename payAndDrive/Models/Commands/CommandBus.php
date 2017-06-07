<?php

namespace payAndDrive\Models\Commands;

interface CommandBus
{
    /**
     * @param Command $command
     */
    public function dispatch(Command $command);
}

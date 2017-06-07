<?php

namespace payAndDrive\Models\Handlers;

use payAndDrive\Models\Commands\Command;

interface HandlerLocator
{
    /**
     * @param Command $command
     * @return CommandHandler
     */
    public function getHandler(Command $command);
}

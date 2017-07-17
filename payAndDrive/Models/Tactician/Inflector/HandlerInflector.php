<?php

namespace payAndDrive\Models\Tactician\Inflector;

use payAndDrive\Models\Commands\Command;
use payAndDrive\Models\Handlers\CommandHandler;

class HandlerInflector
{
    public function inflect(Command $command, CommandHandler $commandHandler)
    {
        $commandHandler->handle($command);
    }
}
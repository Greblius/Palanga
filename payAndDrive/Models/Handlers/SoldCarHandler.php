<?php

namespace payAndDrive\Models\Handlers;

use payAndDrive\Models\Commands\Command;

class SoldCarHandler implements CommandHandler
{
    public function handle(Command $command)
    {
        $command->execute();
    }
}
<?php

namespace payAndDrive\src\BuyCarModule\Handlers;

use payAndDrive\src\BuyCarModule\Commands\Command;

class SoldCarHandler implements CommandHandler
{
    public function handle(Command $command)
    {
        $command->execute();
    }
}
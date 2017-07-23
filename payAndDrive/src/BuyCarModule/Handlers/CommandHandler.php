<?php

namespace payAndDrive\src\BuyCarModule\Handlers;

use payAndDrive\src\BuyCarModule\Commands\Command;

interface CommandHandler
{
    public function handle(Command $command);
}

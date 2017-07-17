<?php

namespace payAndDrive\Models\Handlers;

use payAndDrive\Models\Commands\Command;

interface CommandHandler
{
    public function execute(Command $command);
}

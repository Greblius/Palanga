<?php

namespace payAndDrive\Libs\Tactician\Inflector;

class HandlerInflector
{
    public function inflect($command, $commandHandler)
    {
        $commandHandler->handle($command);
    }
}
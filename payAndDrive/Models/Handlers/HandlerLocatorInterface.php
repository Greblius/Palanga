<?php

namespace payAndDrive\Models\Handlers;

interface HandlerLocatorInterface
{
    /**
     * @param string $commandName
     * @return CommandHandler
     */
    public function getHandlerForCommand($commandName);
}

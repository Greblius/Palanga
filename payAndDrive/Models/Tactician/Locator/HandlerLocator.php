<?php

namespace payAndDrive\Models\Tactician\Locator;

use payAndDrive\Models\Handlers\CommandHandler;
use payAndDrive\Models\Handlers\HandlerLocatorInterface;

class HandlerLocator implements HandlerLocatorInterface
{
    /** @var CommandHandler[] */
    private $handlers = [];

    /**
     * @param CommandHandler $handler
     * @param string $commandClassName
     */
    public function addHandler(CommandHandler $handler, $commandClassName)
    {
        $this->handlers[$commandClassName] = $handler;
    }

    /**
     * @param array $commandClassToHandlerMap
     */
    public function addHandlers(array $commandClassToHandlerMap)
    {
        foreach ($commandClassToHandlerMap as $commandClass => $handler) {
            $this->handlers[$commandClass] = $handler;
        }
    }

    /**
     * @param string $commandName
     * @return CommandHandler|null
     */
    public function getHandlerForCommand($commandName)
    {
        $handler = null;

        if (isset($this->handlers[$commandName])) {
            $handler = $this->handlers[$commandName];
        }

        return $handler;
    }
}

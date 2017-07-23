<?php

namespace payAndDrive\Libs\Tactician\Locator;

use payAndDrive\Models\Handlers\CommandHandler;

class HandlerLocator
{
    /** @var CommandHandler[] */
    private $handlers = [];

    /**
     * @param $handler
     * @param string $commandClassName
     */
    public function addHandler($handler, $commandClassName)
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

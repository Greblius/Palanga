<?php

namespace payAndDrive\src\BuyCarModule\Handlers;

use payAndDrive\src\BuyCarModule\Commands\Command;
use payAndDrive\src\BuyCarModule\Maps\CommandHandlerMap;

class BasicHandlerLocator implements HandlerLocator
{
    /** @var array  */
    private $handlerMap;

    public function __construct(CommandHandlerMap $map)
    {
        $this->handlerMap = $map->getMap();
    }

    /**
     * @param Command $command
     * @return CommandHandler
     */
    public function getHandler(Command $command)
    {
        $handler = null;

        if (isset($this->handlerMap[get_class($command)])) {
            $handler = $this->handlerMap[get_class($command)];
        }

        return $handler;
    }
}

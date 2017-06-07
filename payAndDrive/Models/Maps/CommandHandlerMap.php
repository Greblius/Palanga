<?php

namespace payAndDrive\Models\Maps;

use payAndDrive\Models\Commands\SellCarCommand;
use payAndDrive\Models\Handlers\SoldCarHandler;

class CommandHandlerMap
{
    /** @var  array */
    private $handlerMap;

    public function __construct()
    {
        $this->handlerMap = [
            SellCarCommand::class => new SoldCarHandler()
        ];
    }

    /**
     * @return array
     */
    public function getMap()
    {
        return $this->handlerMap;
    }
}
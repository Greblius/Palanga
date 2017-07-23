<?php

namespace payAndDrive\src\BuyCarModule\Maps;

use payAndDrive\src\BuyCarModule\Commands\SellCarCommand;
use payAndDrive\src\BuyCarModule\Handlers\SoldCarHandler;

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
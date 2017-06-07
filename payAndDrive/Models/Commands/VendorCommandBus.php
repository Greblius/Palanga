<?php

namespace payAndDrive\Models\Commands;

use payAndDrive\Models\Handlers\HandlerLocator;

class VendorCommandBus implements CommandBus
{
    /** @var  HandlerLocator */
    private $locator;

    public function __construct(HandlerLocator $locator)
    {
        $this->locator = $locator;
    }

    /**
     * @param Command $command
     */
    public function dispatch(Command $command)
    {
        $this->locator->getHandler($command)->handle($command);
    }
}

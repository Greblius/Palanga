<?php

namespace payAndDrive\Models\Commands;

use payAndDrive\Models\Handlers\HandlerLocator;
use payAndDrive\Models\Tactician\TacticianHandleBox;

class VendorCommandBus implements CommandBus
{
    /** @var  TacticianHandleBox */
    private $tactician;

    public function __construct(TacticianHandleBox $tactician)
    {
        $this->locator = $tactician;
    }

    /**
     * @param Command $command
     */
    public function dispatch(Command $command)
    {
        $commandName = $this->tactician->getExtractor()->extract($command);
        $handler = $this->tactician->getLocator()->getHandlerForCommand($commandName);
        $this->tactician->getInflector()->inflect($command, $handler);
    }
}

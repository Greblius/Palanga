<?php

namespace payAndDrive\src\BuyCarModule\Controllers;

use payAndDrive\Libs\Tactician\Extractor\CommandClassNameExtractor;
use payAndDrive\Libs\Tactician\Inflector\HandlerInflector;
use payAndDrive\Libs\Tactician\Locator\HandlerLocator;
use payAndDrive\Libs\Tactician\TacticianHandleBox;
use payAndDrive\src\BuyCarModule\Commands\VendorCommandBus;
use payAndDrive\src\BuyCarModule\Handlers\CommandHandler;

trait CommandBusTrait
{
    /** @var  TacticianHandleBox */
    private $tactitianHandleBox;

    /** @var  HandlerLocator */
    private $handlerLocator;

    /**
     * @return TacticianHandleBox
     */
    private function getTacticianHandleBox()
    {
        if (null === $this->tactitianHandleBox) {
            $this->tactitianHandleBox = new TacticianHandleBox(
                new CommandClassNameExtractor(),
                $this->handlerLocator,
                new HandlerInflector()
            );
        }

        return $this->tactitianHandleBox;
    }

    public function addNewHandlerForCommandBus(CommandHandler $handler, $commandName)
    {
        if (null === $this->handlerLocator) {
            $this->handlerLocator = new HandlerLocator();
        }

        $this->handlerLocator->addHandler($handler, $commandName);
    }

    /**
     * @return VendorCommandBus
     */
    public function getCommandBus()
    {
        return new VendorCommandBus($this->getTacticianHandleBox());
    }
}
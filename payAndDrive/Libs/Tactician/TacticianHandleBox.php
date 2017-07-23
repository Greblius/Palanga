<?php

namespace payAndDrive\Libs\Tactician;

use payAndDrive\Libs\Tactician\Extractor\CommandClassNameExtractor;
use payAndDrive\Libs\Tactician\Inflector\HandlerInflector;
use payAndDrive\Libs\Tactician\Locator\HandlerLocator;

class TacticianHandleBox
{
    /** @var  CommandClassNameExtractor */
    private $extractor;

    /** @var  HandlerLocator */
    private $locator;

    /** @var  HandlerInflector */
    private $inflector;

    public function __construct(
        CommandClassNameExtractor $extractor,
        HandlerLocator $handlerLocator,
        HandlerInflector $inflector
    )
    {
        $this->extractor = $extractor;
        $this->locator = $handlerLocator;
        $this->inflector = $inflector;
    }

    /**
     * @return CommandClassNameExtractor
     */
    public function getExtractor()
    {
        return $this->extractor;
    }

    /**
     * @return HandlerLocator
     */
    public function getLocator()
    {
        return $this->locator;
    }

    /**
     * @return HandlerInflector
     */
    public function getInflector()
    {
        return $this->inflector;
    }
}
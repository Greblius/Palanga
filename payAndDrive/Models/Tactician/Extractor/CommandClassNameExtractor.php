<?php

namespace payAndDrive\Models\Tactician\Extractor;

use payAndDrive\Models\Commands\Command;

class CommandClassNameExtractor
{
    public function extract(Command $command)
    {
        return get_class($command);
    }
}
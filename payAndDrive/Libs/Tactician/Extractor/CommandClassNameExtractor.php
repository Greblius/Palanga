<?php

namespace payAndDrive\Libs\Tactician\Extractor;

class CommandClassNameExtractor
{
    public function extract($command)
    {
        return get_class($command);
    }
}
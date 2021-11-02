<?php

namespace App\Service\Reader;

class FileReader implements ReaderInterface
{
    public function read(string $resource): string
    {
        return file_get_contents($resource);
    }
}
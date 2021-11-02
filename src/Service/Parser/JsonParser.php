<?php

namespace App\Service\Parser;

class JsonParser implements ParserInterface
{
    public function parse(string $content): array
    {
        return json_decode($content, true);
    }
}
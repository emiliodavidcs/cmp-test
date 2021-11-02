<?php

namespace App\Service\Parser;

class YamlParser implements ParserInterface
{
    public function parse(string $content): array
    {
        return \yaml_parse($content);
    }
}
<?php

namespace App\Tests\Service\Parser;

use App\Service\Parser\JsonParser;
use PHPUnit\Framework\TestCase;

class JsonParserTest extends TestCase
{
    public function testParse(): void
    {
        $dummyJson = '{"test": "ok"}';

        // arrange
        $parser = new JsonParser();

        // act
        $data = $parser->parse($dummyJson);

        // assert
        self::assertIsArray($data);
        self::assertArrayHasKey('test', $data);
        self::assertEquals('ok', $data['test']);
    }
}
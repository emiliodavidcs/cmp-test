<?php

namespace App\Tests\Service\Reader;

use App\Service\Reader\FileReader;
use PHPUnit\Framework\TestCase;

class FileReaderTest extends TestCase
{
    public function testRead(): void
    {
        $dummyFile = '/var/test.text';

        // arrange
        $reader = new FileReader();
        file_put_contents($dummyFile, 'test');

        // act
        $content = $reader->read($dummyFile);

        // assert
        self::assertEquals('test', $content);
    }
}
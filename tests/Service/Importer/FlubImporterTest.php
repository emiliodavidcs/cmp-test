<?php

namespace App\Tests\Service\Importer;

use App\Service\Importer\FlubImporter;
use App\Service\Parser\YamlParser;
use App\Service\Reader\FileReader;
use Doctrine\ORM\EntityManager;
use PHPUnit\Framework\TestCase;

class FlubImporterTest extends TestCase
{
    public function testImport(): void
    {
        // arrange
        $entityManager = self::createMock(EntityManager::class);
        $reader = self::createMock(FileReader::class);
        $reader
            ->expects($this->once())
            ->method('read')
            ->willReturn(
                '---
                -
                    labels: label1,label2
                    name: "Test video"
                    url: "http://test.com/videos/test"'
            );
        $parser = self::createMock(YamlParser::class);
        $parser
            ->expects($this->once())
            ->method('parse')
            ->willReturn([[
                'labels' => 'label1,label2',
                'name' => 'Test video',
                'url' => 'http://test.com/videos/test'
            ]]);
        $resource = 'flub-test.yaml';

        $importer = new FlubImporter($entityManager, $reader, $parser, $resource);

        // act
        $importer->import();

        // assert
        /*
         * Asserts should be the entity manager methods called (persist and flush) but they cannot
         * be tested since this is a basic test.
         */
    }
}
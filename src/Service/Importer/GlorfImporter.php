<?php

namespace App\Service\Importer;

use App\Entity\Video;
use App\Service\Output\VideoImportOutput;
use App\Service\Parser\ParserInterface;
use App\Service\Reader\ReaderInterface;
use Doctrine\ORM\EntityManagerInterface;

class GlorfImporter implements ImporterInterface
{
    private $entityManager;
    private $reader;
    private $parser;
    private $resource;

    public function __construct(
        EntityManagerInterface $entityManager,
        ReaderInterface $reader,
        ParserInterface $parser,
        string $resource
    ) {
        $this->entityManager = $entityManager;
        $this->reader = $reader;
        $this->parser = $parser;
        $this->resource = $resource;
    }

    public function import(): void
    {
        $content = $this->reader->read($this->resource);
        $data = $this->parser->parse($content);

        $this->createVideos($data);
    }

    private function createVideos(array $data): void
    {
        foreach ($data['videos'] as $videoData) {
            $video = new Video();
            $video->setTitle($videoData['title']);
            $video->setTags($videoData['tags']);
            $video->setUrl($videoData['url']);

            VideoImportOutput::output($video);

//            $this->entityManager->persist($video);
        }

//        $this->entityManager->flush();
    }
}
<?php

namespace App\Service\Output;

use App\Entity\Video;

abstract class VideoImportOutput
{
    public static function output(Video $video): void
    {
        echo sprintf(
            "Importing: %s; Url: %s; Tags: %s\n",
            $video->getTitle(),
            $video->getUrl(),
            implode(',', $video->getTags())
        );
    }
}
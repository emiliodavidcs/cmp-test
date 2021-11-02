<?php

namespace App\Service\Importer;

use App\Constants\VideoSourceConstants;
use Exception;

class ImporterFactory
{
    private $flubImporter;
    private $glorfImporter;

    public function __construct(
        FlubImporter $flubImporter,
        GlorfImporter $glorfImporter
    ) {
        $this->flubImporter = $flubImporter;
        $this->glorfImporter = $glorfImporter;
    }

    public function getImporter(string $source): ImporterInterface
    {
        switch ($source) {
            case VideoSourceConstants::SOURCE_FLUB:
                return $this->flubImporter;
            case VideoSourceConstants::SOURCE_GLORF:
                return $this->glorfImporter;
            default:
                throw new Exception('Unknown video source');
        }
    }
}
<?php

namespace App\Command;

use App\Service\Importer\ImporterFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportVideosCommand extends Command
{
    const ARG_SOURCE = 'source';

    private $importerFactory;

    public function __construct(ImporterFactory $importerFactory, $name = null)
    {
        $this->importerFactory = $importerFactory;

        parent::__construct($name);
    }

    protected function configure(): void
    {
        $this
            ->setName('app:import-videos')
            ->setDescription('Import videos from a given source')
            ->addArgument(self::ARG_SOURCE, InputArgument::REQUIRED, 'The source where to retrieve videos from');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $source = $input->getArgument(self::ARG_SOURCE);
        $importer = $this->importerFactory->getImporter($source);

        $importer->import();

        return Command::SUCCESS;
    }
}
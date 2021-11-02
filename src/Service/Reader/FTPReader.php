<?php

namespace App\Service\Reader;

class FTPReader implements ReaderInterface
{
    public function __construct()
    {
        // TODO: receive any parameter or credentials required for the FTP connection
    }

    public function read(string $resource): string {
        // TODO: implement FTP read process
        return '';
    }
}
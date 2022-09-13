<?php
declare(strict_types = 1);

namespace Kareem\ProductListParser\Src;

use Kareem\ProductListParser\Src\Interfaces\FileOpenerInterface;

class FileOpener implements FileOpenerInterface{

    public function openForReading($file_name) 
    {
        return fopen($file_name, "r");
    }

    public function openForWriting($file_name) 
    {
        return fopen($file_name, "w");
    }
}
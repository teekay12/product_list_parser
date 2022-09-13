<?php

namespace Kareem\ProductListParser\Src\Parsers;

use Kareem\ProductListParser\Src\Interfaces\FileOpenerInterface;
use Kareem\ProductListParser\Src\Parsers\ProductParser;

class CsvProductParser extends ProductParser {
    public function __construct(FileOpenerInterface $file_opener){
        parent::__construct($file_opener);
    }

    function getLine($opened_file) {
        return fgetcsv($opened_file);
    }
}
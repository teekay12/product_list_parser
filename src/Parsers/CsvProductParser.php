<?php

namespace Kareem\ProductListParser\Parsers;

use Kareem\ProductListParser\Interfaces\FileOpenerInterface;
use Kareem\ProductListParser\Parsers\ProductParser;

class CsvProductParser extends ProductParser {
    public function __construct(FileOpenerInterface $file_opener){
        parent::__construct($file_opener);
    }

    function getLine($opened_file) {
        return fgetcsv($opened_file);
    }
}
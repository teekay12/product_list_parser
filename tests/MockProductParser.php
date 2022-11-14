<?php

namespace Tests\Unit;

use Kareem\ProductListParser\Interfaces\ProductParserInterface;
use Kareem\ProductListParser\Interfaces\FileOpenerInterface;
use Kareem\ProductListParser\Models\Product;
use Kareem\ProductListParser\Parsers\ProductParser;

class MockProductParser extends ProductParser {
    public function __construct(FileOpenerInterface $file_opener){
        parent::__construct($file_opener);
    }

    public function getLine($opened_file){
        return [];
    }
}
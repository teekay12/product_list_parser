<?php

namespace Kareem\ProductListParser\Factories;

use Kareem\ProductListParser\Interfaces\ProductParserInterface;
use Kareem\ProductListParser\FileOpener;
use Kareem\ProductListParser\Parsers\CsvProductParser;
use Kareem\ProductListParser\Parsers\TsvProductParser;
use Kareem\ProductListParser\Traits\Helpers;

class ProductParserFactory {

    use Helpers;

    public static function getProductParser($file_name) : ProductParserInterface{
        $file_type = (new ProductParserFactory)->fileTyp($file_name);

        $file_opener = new FileOpener();

        if($file_type == "csv"){
            return new CsvProductParser($file_opener);
        }
        if($file_type == "tsv"){
            return new TsvProductParser($file_opener);
        }
        throw new \Exception('file type not supported');
    }
}
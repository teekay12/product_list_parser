<?php

namespace Kareem\ProductListParser\Src\Factory;

use Kareem\ProductListParser\Src\Interface\ProductParserInterface;
use Kareem\ProductListParser\Src\FileOpener;
use Kareem\ProductListParser\Src\Parsers\CsvProductParser;
use Kareem\ProductListParser\Src\Parsers\TsvProductParser;
use Kareem\ProductListParser\Src\Traits\Helpers;

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
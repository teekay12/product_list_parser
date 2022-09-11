<?php

require APP_PATH . "Parsers" . DIRECTORY_SEPARATOR . "CsvProductParser.php";
require APP_PATH . "Parsers" . DIRECTORY_SEPARATOR . "TsvProductParser.php";

class ProductParserFactory {
    public static function getProductParser($file_name) : ProductParserInterface{
        $file_type = fileTyp($file_name);
        if($file_type == "csv"){
            return new CsvProductParser();
        }
        if($file_type == "tsv"){
            return new TsvProductParser();
        }
        throw new \Exception('file type not supported');
    }
}
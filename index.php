<?php

declare(strict_types = 1);

require 'vendor/autoload.php';

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'product list parser' . DIRECTORY_SEPARATOR;

define('PUBLIC_PATH', $root . 'public' . DIRECTORY_SEPARATOR);
define('APP_PATH', $root . 'src' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'public' .DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require APP_PATH . "Traits" . DIRECTORY_SEPARATOR . 'helpers.php';
require APP_PATH . "App.php";
require APP_PATH . "Interface" . DIRECTORY_SEPARATOR . "ProductParserInterface.php";
require APP_PATH . "Interface" . DIRECTORY_SEPARATOR . "FileOpenerInterface.php";
require APP_PATH . "Factory" . DIRECTORY_SEPARATOR . "ProductParserFactory.php";
require APP_PATH . "Models" . DIRECTORY_SEPARATOR . "Product.php";
require APP_PATH . "FileOpener.php";
require APP_PATH . "ProductParser.php";
require APP_PATH . "Parsers" . DIRECTORY_SEPARATOR . "CsvProductParser.php";
require APP_PATH . "Parsers" . DIRECTORY_SEPARATOR . "TsvProductParser.php";

$short_options = "f:u::";
$long_options = ["file:", "unique-combinations::"];
    
$options = getopt($short_options, $long_options);

$file_name = null;
$unique_combination_file_name = null;

if(isset($options) && count($options) > 0){
    $file = FILES_PATH.($options["f"] ?? $options["file"]);

    if(isset($options["unique-combinations"]) || isset($options["u"])){
        $unique_combination_file_name = (string) $options["u"] ?? $options["unique-combinations"];
    }
    
    $file_name = filePathValidation($file);

    if(!fileNameValidation($file_name)){
        throw new \Exception('Invalid file format');
    }

    if(!file_exists($file_name)){
        throw new \Exception('file does not exist');
    }

    $product_parser = Kareem\ProductListParser\Src\Factory\ProductParserFactory::getProductParser($file_name);
    $product_parser->parseFile($file_name, $unique_combination_file_name);

}else{
    echo "invalid Command";
}

function filePathValidation($file_name) : string {
    if(strpos($file_name, "/") || strpos($file_name, "\\")){
        $file_name = str_replace("/", "\\", $file_name);
    }
    return $file_name;
}
function fileNameValidation($file_name): bool {
    if(strpos($file_name, "/") || strpos($file_name, "\\")){
        $last_slash_occurence = strrpos($file_name, "\\");
        $file_name = substr($file_name, $last_slash_occurence + 1);
    }

    if(substr_count($file_name, ".") > 1) return false;
    else return true;
}
<?php

declare(strict_types = 1);

require APP_PATH . "Parser.php";
require APP_PATH . "Factory" . DIRECTORY_SEPARATOR . "ProductParserFactory.php";

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

    $product_parser = ProductParserFactory::getProductParser($file_name);
    $product_parser->parseFile($file_name, $unique_combination_file_name);

}else{
    echo "invalid Command";
}


<?php
declare(strict_types = 1);

namespace Kareem\ProductListParser\Src\Test;

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root);

//require APP_PATH . "Tests" . DIRECTORY_SEPARATOR . "MockProductParser.php";
//require APP_PATH . "Tests" . DIRECTORY_SEPARATOR . "MockFileOpener.php";
require APP_PATH . "Interfaces" . DIRECTORY_SEPARATOR . "FileOpenerInterface.php";
require APP_PATH . "Interfaces" . DIRECTORY_SEPARATOR . "ProductParserInterface.php";
require APP_PATH . "Models" . DIRECTORY_SEPARATOR . "Product.php";
require APP_PATH . "Parsers" . DIRECTORY_SEPARATOR . "ProductParser.php";
require APP_PATH . "FileOpener.php";
require APP_PATH . "Parsers" . DIRECTORY_SEPARATOR . "CsvProductParser.php";

use PHPUnit\Framework\TestCase;
use Kareem\ProductListParser\Src\FileOpener;
use Kareem\ProductListParser\Src\Parsers\CsvProductParser;

class CsvProductParserTests extends TestCase {
    
    public function test_it_creates_product_parser_object_and_maps_value() : void{
        $product_list_header = ["make", "model", "color", "capacity", "network", "grade", "condition"];

        $product_list_body = [
            ["Acer", "Acer Aspire V5-571", "Aluminium Silver", "4GB", "Grade A - Very Good Condition", "Not Applicable", "Not Applicable"],
            ["Acer", "Acer Aspire V5-571", "Aluminium Silver", "4GB", "Grade A - Very Good Condition", "Not Applicable", "Not Applicable"],
            ["Acer", "Acer Aspire V5-571", "Aluminium Silver", "6GB", "Grade A - Very Good Condition", "Not Applicable", "Not Applicable"]
        ];
        $parser = new CsvProductParser(new FileOpener());

        $product = $parser->parseFile("./public/files/products.csv");

        
    }
}   
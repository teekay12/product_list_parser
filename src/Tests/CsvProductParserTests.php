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
        
        $parser = new CsvProductParser(new FileOpener());

        $product = $parser->parseFile("./public/files/products.csv");

        $this->assertEquals(4, count($parser->unique_products));

        $this->assertEquals(3, array_values($parser->unique_products)[0]);

        $this->assertEquals(1, array_values($parser->unique_products)[1]);

        $this->assertEquals(1, array_values($parser->unique_products)[2]);

        $this->assertEquals(8, array_values($parser->unique_products)[3]);
    }
}   
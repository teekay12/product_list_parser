<?php
declare(strict_types = 1);
//use PHPUnit\Framework\TestCase;

//require APP_PATH . "ProductParser.php";
//require APP_PATH . "Test" . DIRECTORY_SEPARATOR . "MockFileOpener.php";
//require APP_PATH . "Test" . DIRECTORY_SEPARATOR . "MockProductParser.php";


require "../src/ProductParser.php";
require "MockFileOpener.php";
require "MockProductParser.php";

class ProductParserTests extends \PHPUnit\Framework\TestCase {

    public function mapProductObjectIsCreatedCorrectlyTest(){
        $parser = new MockProductParser(new MockFileOpener());

        $header = ["make", "model", "color", "capacity", "network", "grade", "condition"];
        $product_line = ["Acer", "Acer Aspire V5-571", "Working", "Grade A - Very Good Condition", "4GB", "Aluminium Silver", "Not Applicable"];

        $product = $parser->mapProductObject($header, $product_line);

        $this->assertTrue(property_exists($product,  'make'));
    }

    public function parseFileTest(){
        
    }

    public function exportUniqueCombination(){
        
    }
}   
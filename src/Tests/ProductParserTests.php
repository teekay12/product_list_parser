<?php
declare(strict_types = 1);

namespace Kareem\ProductListParser\Src\Test;

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root);

require APP_PATH . "Tests" . DIRECTORY_SEPARATOR . "MockProductParser.php";
require APP_PATH . "Tests" . DIRECTORY_SEPARATOR . "MockFileOpener.php";

use PHPUnit\Framework\TestCase;
use Kareem\ProductListParser\Src\Test\MockProductParser;
use Kareem\ProductListParser\Src\Test\MockFileOpener;

class ProductParserTests extends TestCase {
    
    public function test_it_creates_product_parser_object_and_maps_value() : void{
        $header = ["make", "model", "color", "capacity", "network", "grade", "condition"];
        $product_line = ["Acer", "Acer Aspire V5-571", "Aluminium Silver", "4GB", "Grade A - Very Good Condition", "Not Applicable", "Not Applicable"];

        $parser = new MockProductParser(new MockFileOpener());

        $product = $parser->mapProductObject($header, $product_line);

        $this->assertTrue(property_exists($product,  'make'));
        $this->assertTrue(property_exists($product,  'model'));
        $this->assertTrue(property_exists($product,  'color'));
        $this->assertTrue(property_exists($product,  'capacity'));
        $this->assertTrue(property_exists($product,  'network'));
        $this->assertTrue(property_exists($product,  'grade'));
        $this->assertTrue(property_exists($product,  'condition'));

        $this->assertEquals("Acer", $product->make);
        $this->assertEquals("Acer Aspire V5-571", $product->model);
        $this->assertEquals("Aluminium Silver", $product->color);
        $this->assertEquals("4GB", $product->capacity);
        $this->assertEquals("Grade A - Very Good Condition", $product->network);
        $this->assertEquals("Not Applicable", $product->grade);
        $this->assertEquals("Not Applicable", $product->condition);
    }
}   
<?php
declare(strict_types = 1);

namespace Kareem\ProductListParser\Src\Test;

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root);

require APP_PATH . "Test" . DIRECTORY_SEPARATOR . "MockProductParser.php";
require APP_PATH . "Test" . DIRECTORY_SEPARATOR . "MockFileOpener.php";

use PHPUnit\Framework\TestCase;
use Kareem\ProductListParser\Src\Test\MockProductParser;
use Kareem\ProductListParser\Src\Test\MockFileOpener;

class ProductParserTests extends TestCase {
    
    public function test_it_creates_product_parser_object() : void{
        $header = ["make", "model", "color", "capacity", "network", "grade", "condition"];
        $product_line = ["Acer", "Acer Aspire V5-571", "Working", "Grade A - Very Good Condition", "4GB", "Aluminium Silver", "Not Applicable"];

        $parser = new MockProductParser(new MockFileOpener());

        $product = $parser->mapProductObject($header, $product_line);

        $this->assertTrue(property_exists($product,  'make'));
    }

    public function test_it_maps_product_parser_object() : void{
        $header = ["make", "model", "color", "capacity", "network", "grade", "condition"];
        $product_line = ["Acer", "Acer Aspire V5-571", "Working", "Grade A - Very Good Condition", "4GB", "Aluminium Silver", "Not Applicable"];

        $parser = new MockProductParser(new MockFileOpener());

        $product = $parser->mapProductObject($header, $product_line);

        $this->assertEquals("Acer", $product->make);
        $this->assertEquals("Not Applicable", $product->condition);
    }
}   
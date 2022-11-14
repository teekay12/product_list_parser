<?php
declare(strict_types = 1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Tests\Unit\MockProductParser;
use Tests\Unit\MockFileOpener;

class ProductParserTests extends TestCase {
    
    protected $header = [];
    protected $productLine = [];
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->header = ["make", "model", "color", "capacity", "network", "grade", "condition"];
        $this->productLine = ["Acer", "Acer Aspire V5-571", "Aluminium Silver", "4GB", "Grade A - Very Good Condition", "Not Applicable", "Not Applicable"];
    }

    public function test_it_creates_product_parser_object_and_maps_value() : void{
        $parser = new MockProductParser(new MockFileOpener());

        $product = $parser->mapProductObject($this->header, $this->productLine);

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
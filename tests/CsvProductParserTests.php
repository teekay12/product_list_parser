<?php
declare(strict_types = 1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Kareem\ProductListParser\FileOpener;
use Kareem\ProductListParser\Parsers\CsvProductParser;

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
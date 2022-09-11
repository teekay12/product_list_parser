<?php
 Interface ProductParserInterface{
    public function mapProductObject(array $header, array $product_line);
    public function parseFile(string $file_name);
    public function exportUniqueCombination(array $header, array $unique_products);
 }
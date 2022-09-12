<?php

namespace Kareem\ProductListParser\Src\Test;

require APP_PATH . "Interface" . DIRECTORY_SEPARATOR . "ProductParserInterface.php";
require APP_PATH . "Interface" . DIRECTORY_SEPARATOR . "FileOpenerInterface.php";
require APP_PATH . "Models" . DIRECTORY_SEPARATOR . "Product.php";
require APP_PATH . "ProductParser.php";

use Kareem\ProductListParser\Src\Interface\ProductParserInterface;
use Kareem\ProductListParser\Src\Interface\FileOpenerInterface;
use Kareem\ProductListParser\Src\Models\Product;
use Kareem\ProductListParser\Src\ProductParser;

class MockProductParser extends ProductParser {
    public function __construct(FileOpenerInterface $file_opener){
        parent::__construct($file_opener);
    }

    public function getLine($opened_file){
        return [];
    }
}
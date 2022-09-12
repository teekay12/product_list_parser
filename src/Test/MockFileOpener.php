<?php

namespace Kareem\ProductListParser\Src\Test;

require APP_PATH . "ProductParser.php";
require APP_PATH . "Interface" . DIRECTORY_SEPARATOR . "FileOpenerInterface.php";

class MockFileOpener implements FileOpenerInterface {
    public function openForReading($file_name){
        return [];
    }

    public function openForWriting($file_name){
        return [];
    }
}
<?php

namespace Kareem\ProductListParser\Src\Test;

use Kareem\ProductListParser\Src\Interface\FileOpenerInterface;

class MockFileOpener implements FileOpenerInterface {
    public function openForReading($file_name){
        return [];
    }

    public function openForWriting($file_name){
        return [];
    }
}
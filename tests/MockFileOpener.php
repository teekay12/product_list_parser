<?php

namespace Tests\Unit;

use Kareem\ProductListParser\Interfaces\FileOpenerInterface;

class MockFileOpener implements FileOpenerInterface {
    public function openForReading($file_name){
        return [];
    }

    public function openForWriting($file_name){
        return [];
    }
}
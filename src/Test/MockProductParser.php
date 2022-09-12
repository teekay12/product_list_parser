<?php

require APP_PATH . "ProductParser.php";
require APP_PATH . "Interface" . DIRECTORY_SEPARATOR . "FileOpenerInterface.php";

class MockProductParser extends ProductParser {
    public function __construct(FileOpenerInterface $file_opener){
        parent::__construct($file_opener);
    }

    public function getLine(){
        return [];
    }
}
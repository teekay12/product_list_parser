<?php

class CsvProductParser extends Parser {
    function getLine($opened_file) {
        return fgetcsv($opened_file);
    }
}
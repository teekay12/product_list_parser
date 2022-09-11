<?php

class TsvProductParser extends Parser { 
    function getLine($opened_file) {
        return fgetcsv($opened_file, null, "\t");
    }
}
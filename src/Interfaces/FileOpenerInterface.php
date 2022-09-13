<?php

namespace Kareem\ProductListParser\Src\Interfaces;

Interface FileOpenerInterface {
    public function openForReading($file_name);
    public function openForWriting($file_name);
}
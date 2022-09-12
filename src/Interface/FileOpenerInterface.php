<?php

namespace Kareem\ProductListParser\Src\Interface;

Interface FileOpenerInterface {
    public function openForReading($file_name);
    public function openForWriting($file_name);
}
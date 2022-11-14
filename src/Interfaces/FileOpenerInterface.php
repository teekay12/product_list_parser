<?php

namespace Kareem\ProductListParser\Interfaces;

Interface FileOpenerInterface {
    public function openForReading($file_name);
    public function openForWriting($file_name);
}
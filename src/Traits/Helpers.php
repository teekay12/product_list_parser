<?php 

declare(strict_types = 1);

namespace Kareem\ProductListParser\Src\Traits;

trait Helpers{
    public function filePathValidation($file_name) : string {
        if(strpos($file_name, "/") || strpos($file_name, "\\")){
            $file_name = str_replace("/", "\\", $file_name);
        }
        return $file_name;
    }
    public function fileNameValidation($file_name): bool {
        if(strpos($file_name, "/") || strpos($file_name, "\\")){
            $last_slash_occurence = strrpos($file_name, "\\");
            $file_name = substr($file_name, $last_slash_occurence + 1);
        }

        if(substr_count($file_name, ".") > 1) return false;
        else return true;
    }
    public function fileTyp($file_name) : string {
        return substr($file_name, strpos($file_name, ".") + 1);
    }
}
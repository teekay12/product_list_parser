<?php

namespace Kareem\ProductListParser\bootstrap;

class App
{
    protected string $root = dirname(__DIR__) . "\productlistparser\\";
    protected const PUBLIC_PATH =  $root . 'public' . DIRECTORY_SEPARATOR;
    protected const APP_PATH = self::ROOT . 'src' . DIRECTORY_SEPARATOR;
    protected const FILES_PATH =  self::ROOT . 'public' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR;
    protected const VIEWS_PATH = self::ROOT . 'views' . DIRECTORY_SEPARATOR;

    protected const SHORT_OPTIONS = "f:u::";
    protected const LONG_OPTIONS = ["file:", "unique-combinations::"];

    protected string $file;

    public function getOptions(): array
    {
        return getopt(self::SHORT_OPTIONS, self::LONG_OPTIONS);
    }

    public function setFileName()
    {
        $options = $this->getOptions();
        if (isset($options) && count($options) > 0) {
            //$file = self::3..($options["f"] ?? $options["file"]);
        }
    }

    public function setUniqueCombination()
    {
    }

    public function filePathValidation($file_name): string
    {
        if (strpos($file_name, "/") || strpos($file_name, "\\")) {
            $file_name = str_replace("/", "\\", $file_name);
        }
        return $file_name;
    }

    public function fileNameValidation($file_name): bool
    {
        if (strpos($file_name, "/") || strpos($file_name, "\\")) {
            $last_slash_occurence = strrpos($file_name, "\\");
            $file_name = substr($file_name, $last_slash_occurence + 1);
        }

        if (substr_count($file_name, ".") > 1) return false;
        else return true;
    }
}

<?php

declare(strict_types = 1);
require __DIR__ . '/vendor/autoload.php';

use Kareem\ProductListParser\Factories\ProductParserFactory;

try {
    $root = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'productlistparser' . DIRECTORY_SEPARATOR;
    $filesPath = $root . 'public' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR;

    define('PUBLIC_PATH', $root . 'public' . DIRECTORY_SEPARATOR);
    define('APP_PATH', $root . 'src' . DIRECTORY_SEPARATOR);
    define('FILES_PATH', $filesPath);
    define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

    $shortOptions = "f:u::";
    $longOptions = ["file:", "unique-combinations::"];

    $options = getopt($shortOptions, $longOptions);

    if (!empty($options)) {
        $file = $options["f"] ?? $options["file"];
        $file = filePathValidation($file);

        if (!fileNameValidation($file)) {
            throw new \Exception('Invalid file format');
        }

        $uniqueCombinationFileName = $options["u"] ?? $options["unique-combinations"] ?? null;
        $filePath = FILES_PATH . $file;

        if (!file_exists($filePath)) {
            throw new \Exception('File does not exist');
        }

        $productParser = ProductParserFactory::getProductParser($filePath);
        $productParser->parseFile($filePath, $uniqueCombinationFileName);
    } else {
        echo "Invalid command";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

function filePathValidation(string $fileName): string
{
    $fileName = str_replace(["/", "\\"], DIRECTORY_SEPARATOR, $fileName);
    return $fileName;
}

function fileNameValidation(string $fileName): bool
{
    $fileName = basename($fileName);
    $extensionCount = substr_count($fileName, ".");

    return $extensionCount === 1;
}
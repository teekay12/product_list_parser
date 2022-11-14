<?php

namespace Kareem\ProductListParser\Parsers;

use Kareem\ProductListParser\Interfaces\ProductParserInterface;
use Kareem\ProductListParser\Interfaces\FileOpenerInterface;
use Kareem\ProductListParser\Models\Product;

abstract class ProductParser implements ProductParserInterface {

    public $unique_products = array();

    public function __construct(FileOpenerInterface $file_opener){
        $this->file_opener = $file_opener;
    }

    public function mapProductObject(array $header, array $product_line) : Product{
        $product = new Product();
        for($i = 0; $i < count($header); $i++){
            $product->{trim($header[$i])} = trim($product_line[$i]);
        }
        return $product;
    }

    public function parseFile(string $file_name, string $unique_combination_file_name = null) : void {
        echo "Product list parsing initiated ...";

        $opened_file = $this->file_opener->openForReading($file_name);
        $header = $this->getLine($opened_file);
        $counter = 0;
        $error_counter = 0;
        $logs = array();

        while (($product_line = $this->getLine($opened_file)) !== false) {
            $counter++;
            $product_line_str = "\"" . implode("\",\"", $product_line) . "\"";

            if($this->validateProductLineWithEscapeCharacter($product_line)){
                array_push($logs, "Product at line {$counter} in file {$file_name} contains an escape character : {$product_line_str}");
                $error_counter++;
                continue;
            }

            $product = $this->mapProductObject($header, $product_line);
            print_r($product);
        
            if(array_key_exists($product_line_str, $this->unique_products)){
                $this->unique_products[$product_line_str] = $this->unique_products[$product_line_str] + 1;
            }else{
                $this->unique_products[$product_line_str] = 1;
            }
        }
        fclose($opened_file);
        if($unique_combination_file_name != null){
            $this->exportUniqueCombination($header, $unique_combination_file_name);
        }

        if(count($logs) > 0){
            $this->exporLogs($logs);
        }

        echo "Product list counter completed. A total of ". $counter - $error_counter." out of {$counter} products parsed.";
    }

    abstract function getLine($opened_file);
 
    public function exportUniqueCombination(array $header, string $unique_combination_file_name = null){
        array_push($header, "count");
        $headerToString = implode(",", $header);

        $file_name = PUBLIC_PATH . $unique_combination_file_name;

        $uniqueCombinationFile = $this->file_opener->openForWriting($file_name);
        fwrite($uniqueCombinationFile, $headerToString."\n");

        foreach($this->unique_products as $key=>$value){
            fwrite($uniqueCombinationFile, $key.",".$value."\n");
        }
        
        fclose($uniqueCombinationFile);
    }

    public function exporLogs(array $logs){
        $file_name = PUBLIC_PATH . "logs" . DIRECTORY_SEPARATOR . "logs.txt";
        $log_file = $this->file_opener->openForWriting($file_name);
        fwrite($log_file, "Product List Logs"."\n");

        foreach($logs as $value){
            fwrite($log_file, $value."\n");
        }
        
        fclose($log_file);
    }

    public function validateProductLineWithEscapeCharacter(array $product_line) : bool {
        $product_line_str = "\"" . implode("\",\"", $product_line) . "\"";

        if(str_contains($product_line_str, "\\\"")){
            return true;
        }else{
            return false;
        }
    }
}
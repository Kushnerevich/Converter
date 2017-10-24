<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 19.10.17
 * Time: 18.25
 */
namespace FileConverter\ParsingFile\CSV;

use FileConverter\AbstractClass\FileCheker;

class CsvFileConverter extends FileCheker
{
    public function parseFile(\SplFileObject $file):array
    {
        while (!$file->eof()) {
            $this->data[] = $file->fgetcsv();
        }
        return $this->data;
    }

    public  function writeToFile(string $outputFilePath,array $data):void
    {
        $file = fopen("$outputFilePath",  "w");
        foreach ($data as $value) {
            fputcsv($file, $value);
        }
        fclose($file);
    }
}
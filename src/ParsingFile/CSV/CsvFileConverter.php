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
    public function parseFile(\SplFileObject $file)
    {
        while(!$file->eof())
        {
            static::$data[] = $file->fgetcsv();
        }
    }

    public  function writeToFile (string $outputFilePath)
    {
        $file = fopen("$outputFilePath",  "w");
        foreach (static::$data as $value)
        {
           echo gettype($value);
            fputcsv($file, $value);

        }
        fclose($file);
    }
}
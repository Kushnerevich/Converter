<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 19.10.17
 * Time: 18.33
 */

namespace FileConverter\ParsingFile\JSON;

use FileConverter\AbstractClass\FileCheker;

class JsonFileConverter extends FileCheker
{
    public function parseFile(\SplFileObject $file)
    {
        static::$data[]=json_decode((string)$file,true);

    }

    public function writeToFile (string $outputFilePath)
    {
        $file = fopen("$outputFilePath",  "w");
        fwrite($file, json_encode(static::$data));
        fclose($file);
    }
}

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
    public function parseFile(\SplFileObject $file):array
    {
        $this->data=json_decode((string)$file, true);
        return $this->data;
    }

    public function writeToFile(string $outputFilePath,array $data):void
    {
        $file = fopen("$outputFilePath",  'w');
        fwrite($file, json_encode($data));
        fclose($file);
    }
}

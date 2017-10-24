<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 19.10.17
 * Time: 18.34
 */

namespace FileConverter\ParsingFile\XML;

use FileConverter\AbstractClass\FileCheker;

class XmlFileConverter extends FileCheker
{
    public function parseFile(\SplFileObject $file):array
    {
        $stingData = $file->fread($file->getSize());
        $xml = simplexml_load_string($stingData);
        $json = json_encode($xml);
        $this->data=json_decode($json, true);
        return $this->data;
    }

    public function writeToFile(string $outputFilePath,array $data):void
    {
        $file = fopen("$outputFilePath",  'w');
        fwrite($file, xmlrpc_encode($data));
        fclose($file);
    }
}
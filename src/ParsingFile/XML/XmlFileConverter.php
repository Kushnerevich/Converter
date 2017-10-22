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
    public function parseFile(\SplFileObject $file)
    {
        $stingData = $file->fread($file->getSize());
        $xml = simplexml_load_string($stingData);
        $json = json_encode($xml);
        static::$data=json_decode($json,TRUE);
    }

    public function writeToFile(string $outputFilePath)
    {
        $file = fopen("$outputFilePath",  "w");
        $data=xmlrpc_encode(static::$data);
        fwrite($file,$data);
        fclose($file);
        }
}
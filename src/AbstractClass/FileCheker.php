<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 19.10.17
 * Time: 18.22
 */

namespace FileConverter\AbstractClass;

abstract class FileCheker
{
    public $data;
    protected abstract function parseFile(\SplFileObject $file);
    protected abstract function writeToFile(string $outputFilePath,array $data);
}
<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 19.10.17
 * Time: 18.38
 */

namespace FileConverter\Factory;

use FileConverter;
use FileConverter\ParsingFile\CSV\CsvFileConverter;
use FileConverter\ParsingFile\JSON\JsonFileConverter;
use FileConverter\ParsingFile\XML\XmlFileConverter;

class FactoryFile
{
    private $fileExtension;

    function __construct(string $fileExtension)
    {
        $this->fileExtension=$fileExtension;
    }

    public function makeExeplar()
    {
        switch ($this->fileExtension) {
            case "csv":
                return new CsvFileConverter();
                break;
            case "json":
                return new JsonFileConverter();
                break;
            case "xml":
                return new XmlFileConverter();
                break;
            default:
                echo "~~~~~~~~~~~~~~~~~~~".$this->fileExtension."~~~~~~~~~~~~~~~~";
                return null;
                break;
        }
    }
}
<?php

declare(strict_types=1);

namespace FileConverter;

use FileConverter\Factory\FactoryFile;

class Converter
{
    public $filename;

    public function __construct(string $filename)
    {
        $this->filename=$filename;
    }

    public function convert(\SplFileObject $file, string $outputFormat, string $outputFilePath):void
    {
        $createrInitialFile= new FactoryFile(pathinfo($this->filename, PATHINFO_EXTENSION));
        $fileConverter=$createrInitialFile->makeExeplar();
        $data=$fileConverter->parseFile($file);
        $createrFinalFile= new FactoryFile($outputFormat);
        $fileWriter=$createrFinalFile->makeExeplar();
        $fileWriter->writeToFile($outputFilePath, $data);
    }
}

<?php

namespace App\Tex\Compilers;

use Symfony\Component\Process\ExecutableFinder;

class XelatexCompiler implements TexCompiler
{
    private string $xelatexPath;

    public function __construct(ExecutableFinder $executableFinder)
    {
        $this->xelatexPath = $executableFinder->find('xelatex');
    }

    public function getCommand(string $texFilePath, string $outputDirectory, string $outputFileName): string
    {
        return "$this->xelatexPath -pdf -f -interaction=nonstopmode -output-directory=$outputDirectory -jobname=$outputFileName $texFilePath";
    }
}
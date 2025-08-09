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
        // TODO: Add -halt-on-error
        return sprintf(
            '%s -no-shell-escape -shell-restricted -interaction=nonstopmode -file-line-error -output-directory=%s -jobname=%s %s',
            $this->xelatexPath,
            $outputDirectory,
            $outputFileName,
            $texFilePath
        );
    }
}
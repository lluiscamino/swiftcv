<?php

namespace App\Tex\Compilers;

use Symfony\Component\Process\ExecutableFinder;

readonly class PdfLatexCompiler implements TexCompiler
{
    private string $latexMkPath;
    private string $pdfLatexPath;

    public function __construct(ExecutableFinder $executableFinder)
    {
        $this->latexMkPath = $executableFinder->find('latexmk');
        $this->pdfLatexPath = $executableFinder->find('pdflatex');
    }

    public function getCommand(string $texFilePath, string $outputDirectory, string $outputFileName): string
    {
        return "$this->latexMkPath $texFilePath -pdf -f -interaction=nonstopmode -output-directory=$outputDirectory -jobname=$outputFileName -pdflatex=$this->pdfLatexPath";
    }
}
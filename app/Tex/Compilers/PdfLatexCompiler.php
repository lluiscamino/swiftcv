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
        $safePdfLatex = sprintf(
            '%s -no-shell-escape -shell-restricted -interaction=nonstopmode -file-line-error', // TODO: Add -halt-on-error
            $this->pdfLatexPath
        );
        return sprintf(
            '%s -pdf -f -interaction=nonstopmode -output-directory=%s -jobname=%s -pdflatex="%s" %s',
            $this->latexMkPath,
            $outputDirectory,
            $outputFileName,
            $safePdfLatex,
            $texFilePath
        );
    }
}
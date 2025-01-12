<?php

namespace App\Tex;

use App\Files\CreatedFile;
use App\Files\ValidFile;
use Illuminate\Process\Pool;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Process;
use Spatie\TemporaryDirectory\TemporaryDirectory;
use Symfony\Component\Process\ExecutableFinder;

readonly class TexPdfFileCreator
{
    private string $latexMkPath;
    private string $pdfLatexPath;

    public function __construct(ExecutableFinder $executableFinder)
    {
        $this->latexMkPath = $executableFinder->find('latexmk');
        $this->pdfLatexPath = $executableFinder->find('pdflatex');
    }

    /**
     * @param array<mixed, ValidFile> $texFilePaths
     * @return array<mixed, CreatedFile> PDF files indexed by the $texFilePaths key
     */
    public function createPdfFiles(TemporaryDirectory $dir, array $texFilePaths): array
    {
        $outputDir = $dir->path();
        $poolResults = Process::concurrently(function (Pool $pool) use ($texFilePaths, $outputDir) {
            foreach ($texFilePaths as $key => $texFilePath) {
                $pool->as($key)->command($this->getLatexMkCommand($texFilePath->path, $outputDir, $key));
            }
        });
        $results = [];
        foreach ($texFilePaths as $key => $texFilePath) {
            $pdfFilePath = "$outputDir/$key.pdf";
            $results[$key] = file_exists($pdfFilePath) ? CreatedFile::fromPath($pdfFilePath) : CreatedFile::failedFile();
            if ($poolResults[$key]->failed()) {
                Log::warning("Latexmk exited with code {$poolResults[$key]->exitCode()}", [
                    'key' => $key,
                    'texFilePath' => $texFilePath,
                    'command' => $poolResults[$key]->command(),
                    'output' => $poolResults[$key]->output(),
                    'errorOutput' => $poolResults[$key]->errorOutput(),
                ]);
            }
        }
        return $results;
    }

    private function getLatexMkCommand(string $texFilePath, string $outputDirectory, string $outputFileName): string
    {
        return "$this->latexMkPath $texFilePath -pdf -f -interaction=nonstopmode -output-directory=$outputDirectory -jobname=$outputFileName -pdflatex=$this->pdfLatexPath";
    }
}
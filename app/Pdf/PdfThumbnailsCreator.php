<?php

namespace App\Pdf;

use App\Files\CreatedFile;
use App\Files\ValidFile;
use Illuminate\Process\Pool;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Process;
use Spatie\TemporaryDirectory\TemporaryDirectory;
use Symfony\Component\Process\ExecutableFinder;

readonly class PdfThumbnailsCreator
{
    private string $ghostScriptPath;

    public function __construct(ExecutableFinder $executableFinder)
    {
        $this->ghostScriptPath = $executableFinder->find('gs');
    }

    /**
     * @param array<mixed, ValidFile> $pdfFilePaths
     * @return array<mixed, CreatedFile>
     */
    public function createThumbnails(TemporaryDirectory $dir, array $pdfFilePaths): array
    {
        $poolResults = Process::concurrently(function (Pool $pool) use ($dir, $pdfFilePaths) {
            foreach ($pdfFilePaths as $key => $pdfFilePath) {
                $pool->as($key)->command($this->getGhostScriptCommand($pdfFilePath->path, self::getOutputPath($dir, $key)));
            }
        });
        $results = [];
        foreach ($pdfFilePaths as $key => $pdfFilePath) {
            $outputPath = self::getOutputPath($dir, $key);
            $results[$key] = file_exists($outputPath) ? CreatedFile::fromPath($outputPath) : CreatedFile::failedFile();
            if ($poolResults[$key]->failed()) {
                Log::warning("GhostScript failed with code {$poolResults[$key]->exitCode()}", [
                    'key' => $key,
                    'pdfFilePath' => $pdfFilePath,
                    'command' => $poolResults[$key]->command(),
                    'output' => $poolResults[$key]->output(),
                    'errorOutput' => $poolResults[$key]->errorOutput(),
                ]);
            }
        }
        return $results;
    }

    private function getGhostScriptCommand(string $pdfFilePath, string $outputPath): string
    {
        return "$this->ghostScriptPath -sDEVICE=pngalpha -dUseCropBox -dPDFFitPage -dLastPage=1 -dNOPAUSE -dBATCH -dSAFER -sOutputFile='$outputPath' '$pdfFilePath'";
    }

    private static function getOutputPath(TemporaryDirectory $dir, mixed $key): string
    {
        return $dir->path("$key.png");
    }
}
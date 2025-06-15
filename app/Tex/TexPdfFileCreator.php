<?php

namespace App\Tex;

use App\Files\ValidFile;
use App\Tex\Compilers\PdfLatexCompiler;
use App\Tex\Compilers\TexCompiler;
use Illuminate\Process\Pool;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Process;
use Spatie\TemporaryDirectory\TemporaryDirectory;

readonly class TexPdfFileCreator
{
    /**
     * @param array<mixed, TexCompiler> $compilers
     * @param array<mixed, ValidFile> $texFilePaths
     * @return array<mixed, TexPdfFile> PDF files indexed by the $texFilePaths key
     */
    public function createPdfFiles(TemporaryDirectory $dir, array $compilers, array $texFilePaths): array
    {
        $workingDir = $dir->path();
        $poolResults = Process::concurrently(function (Pool $pool) use ($texFilePaths, $compilers, $workingDir) {
            foreach ($texFilePaths as $key => $texFilePath) {
                $compiler = self::getCompiler($compilers, $key);
                $pool->as($key)->path($workingDir)->command($compiler->getCommand($texFilePath->path, $workingDir, $key));
            }
        });
        $results = [];
        foreach ($texFilePaths as $key => $texFilePath) {
            $pdfFilePath = "$workingDir/$key.pdf";
            $results[$key] = self::toTexPdfFile($pdfFilePath, $poolResults[$key]);
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

    /** @param array<mixed, TexCompiler> $compilers */
    private static function getCompiler(array $compilers, mixed $key): TexCompiler
    {
        if (!array_key_exists($key, $compilers)) {
            Log::warning("Compiler for key '$key' not found, using default compiler.", [
                'compilers' => $compilers
            ]);
            return self::getDefaultCompiler();
        }
        return $compilers[$key];
    }

    private static function getDefaultCompiler(): TexCompiler
    {
        return App::make(PdfLatexCompiler::class);
    }

    private static function toTexPdfFile(string $pdfFilePath, mixed $processResult): TexPdfFile
    {
        $creationDetails = TexPdfFileCreationDetails::fromProcessResult($processResult);
        return file_exists($pdfFilePath)
            ? TexPdfFile::fromPathAndCreationDetails($pdfFilePath, $creationDetails)
            : TexPdfFile::failedFileWithCreationDetails($creationDetails);
    }
}
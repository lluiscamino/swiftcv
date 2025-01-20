<?php

namespace App\Tex\Compilers;

interface TexCompiler
{
    function getCommand(string $texFilePath, string $outputDirectory, string $outputFileName): string;
}
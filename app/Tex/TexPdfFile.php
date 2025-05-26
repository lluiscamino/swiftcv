<?php

namespace App\Tex;

use App\Files\CreatedFile;

readonly class TexPdfFile extends CreatedFile
{
    private function __construct(?string $path, public TexPdfFileCreationDetails $creationDetails)
    {
        parent::__construct($path);
    }

    public static function fromPathAndCreationDetails(
        string                    $path,
        TexPdfFileCreationDetails $creationDetails
    ): self
    {
        return new self($path, $creationDetails);
    }

    public static function failedFileWithCreationDetails(TexPdfFileCreationDetails $creationDetails): self
    {
        return new self(null, $creationDetails);
    }
}
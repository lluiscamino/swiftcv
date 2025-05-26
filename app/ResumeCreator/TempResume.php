<?php

namespace App\ResumeCreator;

use App\ResumeTemplates\TemplateType;
use App\Tex\TexPdfFileCreationDetails;
use InvalidArgumentException;
use LogicException;

readonly class TempResume
{
    private function __construct(
        public TemplateType              $templateType,
        public bool                      $successful,
        public string                    $texFilePath,
        private ?string                  $pdfFilePath,
        private ?string                  $thumbnailFilePath,
        public TexPdfFileCreationDetails $texFileCreationDetails
    )
    {
    }

    public function pdfFilePath(): string
    {
        if (!$this->successful) {
            throw new LogicException('Attempted to get PDF file path of failed resume');
        }
        return $this->pdfFilePath;
    }

    public function thumbnailFilePath(): string
    {
        if (!$this->successful) {
            throw new LogicException('Attempted to get thumbnail file path of failed resume');
        }
        return $this->thumbnailFilePath;
    }

    public static function fromPaths(
        TemplateType              $templateType,
        string                    $texFilePath,
        string                    $pdfFilePath,
        string                    $thumbnailFilePath,
        TexPdfFileCreationDetails $texFileCreationDetails
    ): self
    {
        return new self(
            templateType: $templateType,
            successful: true,
            texFilePath: self::validateFile($texFilePath),
            pdfFilePath: self::validateFile($pdfFilePath),
            thumbnailFilePath: self::validateFile($thumbnailFilePath),
            texFileCreationDetails: $texFileCreationDetails
        );
    }

    public static function failedResume(
        TemplateType              $templateType,
        string                    $texFilePath,
        TexPdfFileCreationDetails $texFileCreationDetails
    ): self
    {
        return new self(
            templateType: $templateType,
            successful: false,
            texFilePath: self::validateFile($texFilePath),
            pdfFilePath: null,
            thumbnailFilePath: null,
            texFileCreationDetails: $texFileCreationDetails,
        );
    }

    private static function validateFile(string $path): string
    {
        if (!file_exists($path)) {
            throw new InvalidArgumentException("File $path does not exist");
        }
        return $path;
    }
}
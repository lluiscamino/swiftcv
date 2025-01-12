<?php

namespace App\ResumeCreator;

use App\Files\CreatedFile;
use App\Files\ValidFile;
use App\Pdf\PdfThumbnailsCreator;
use App\ResumeTemplates\TemplateType;
use App\ResumeTemplates\Variables\ResumeVariables;
use App\Tex\TexPdfFileCreator;
use Illuminate\Support\Facades\Blade;
use Spatie\TemporaryDirectory\TemporaryDirectory;

readonly class TempResumeFilesCreator
{
    public function __construct(
        private TexPdfFileCreator    $texPdfFileCreator,
        private PdfThumbnailsCreator $pdfThumbnailsCreator,
    )
    {
    }

    /**
     * @param TemplateType[] $templateTypes
     * @return TempResume[]
     */
    public function createResumeFiles(TemporaryDirectory $dir, array $templateTypes, ResumeVariables $variables): array
    {
        $texFiles = self::createTexFiles($dir, $templateTypes, $variables);
        self::createExtraFiles($dir, $templateTypes);
        $pdfFiles = $this->texPdfFileCreator->createPdfFiles($dir, $texFiles);
        $thumbnailFiles = $this->pdfThumbnailsCreator->createThumbnails($dir, ValidFile::fromCreatedFiles($pdfFiles));
        return array_filter(
            array_map(
                fn(TemplateType $templateType) => self::createTempResume($templateType, $texFiles, $pdfFiles, $thumbnailFiles),
                $templateTypes
            ),
            fn(?TempResume $resumeFiles) => $resumeFiles !== null
        );
    }

    /**
     * @param TemplateType[] $templateTypes
     * @return array<TemplateType, ValidFile> template file paths
     */
    private static function createTexFiles(TemporaryDirectory $dir, array $templateTypes, ResumeVariables $variables): array
    {
        $result = [];
        foreach ($templateTypes as $templateType) {
            $filePath = $dir->path("$templateType->name.tex");
            $texContent = self::getTexContent($templateType, $variables);
            file_put_contents($filePath, $texContent);
            $result[$templateType->name] = ValidFile::fromPath($filePath);
        }
        return $result;
    }

    private static function getTexContent(TemplateType $templateType, ResumeVariables $variables): string
    {
        return Blade::render($templateType->getTemplateContent(), $variables->toArray());
    }

    /**
     * @param TemporaryDirectory $dir
     * @param TemplateType[] $templateTypes
     */
    private static function createExtraFiles(TemporaryDirectory $dir, array $templateTypes): void
    {
        foreach ($templateTypes as $templateType) {
            foreach ($templateType->getExtraFilesNameToContentMap() as $fileName => $content) {
                file_put_contents($dir->path($fileName), $content);
            }
        }
    }

    /**
     * @param array<TemplateType, ValidFile> $texFiles
     * @param array<TemplateType, CreatedFile> $pdfFiles
     * @param array<TemplateType, CreatedFile> $thumbnailFiles
     */
    private function createTempResume(
        TemplateType $templateType,
        array        $texFiles,
        array        $pdfFiles,
        array        $thumbnailFiles
    ): ?TempResume
    {
        $texFile = $texFiles[$templateType->name];
        $pdfFile = $pdfFiles[$templateType->name];
        $thumbnailFile = $thumbnailFiles[$templateType->name] ?? CreatedFile::failedFile();
        if ($pdfFile->failed() || $thumbnailFile->failed()) {
            return null;
        }
        return new TempResume($templateType, $texFile->path, $pdfFile->path(), $thumbnailFile->path());
    }
}
<?php

namespace App\ResumeCreator;

use App\Files\CreatedFile;
use App\Files\ValidFile;
use App\Pdf\PdfThumbnailsCreator;
use App\ResumeTemplates\TemplateType;
use App\ResumeTemplates\Variables\ResumeVariables;
use App\Tex\Compilers\TexCompiler;
use App\Tex\TexPdfFile;
use App\Tex\TexPdfFileCreator;
use App\Tex\TexSanitizer;
use Illuminate\Support\Facades\Blade;
use Spatie\TemporaryDirectory\TemporaryDirectory;

readonly class TempResumeFilesCreator
{
    public function __construct(
        private TexPdfFileCreator    $texPdfFileCreator,
        private PdfThumbnailsCreator $pdfThumbnailsCreator,
        private TexSanitizer         $texSanitizer,
    )
    {
    }

    /**
     * @param TemplateType[] $templateTypes
     * @return TempResume[]
     */
    public function createResumeFiles(TemporaryDirectory $dir, array $templateTypes, ResumeVariables $variables): array
    {
        $texFiles = $this->createTexFiles($dir, $templateTypes, $variables);
        self::createExtraFiles($dir, $templateTypes);
        $pdfFiles = $this->texPdfFileCreator->createPdfFiles($dir, self::createCompilersMap($templateTypes), $texFiles);
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
    private function createTexFiles(TemporaryDirectory $dir, array $templateTypes, ResumeVariables $variables): array
    {
        $result = [];
        foreach ($templateTypes as $templateType) {
            $filePath = $dir->path("$templateType->name.tex");
            $texContent = $this->getTexContent($templateType, $variables);
            file_put_contents($filePath, $texContent);
            $result[$templateType->name] = ValidFile::fromPath($filePath);
        }
        return $result;
    }

    private function getTexContent(TemplateType $templateType, ResumeVariables $variables): string
    {
        return $this->texSanitizer->sanitize(Blade::render($templateType->getTemplateContent(), $variables->toArray()));
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
     * @param TemplateType[] $templateTypes
     * @return array<TemplateType, TexCompiler>
     */
    private static function createCompilersMap(array $templateTypes): array
    {
        $compilers = [];
        foreach ($templateTypes as $templateType) {
            $compilers[$templateType->name] = $templateType->getCompiler();
        }
        return $compilers;
    }

    /**
     * @param array<TemplateType, ValidFile> $texFiles
     * @param array<TemplateType, TexPdfFile> $pdfFiles
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
        return $pdfFile->failed() || $thumbnailFile->failed()
            ? TempResume::failedResume($templateType, $texFile->path, $pdfFile->creationDetails)
            : TempResume::fromPaths(
                templateType: $templateType,
                texFilePath: $texFile->path,
                pdfFilePath: $pdfFile->path(),
                thumbnailFilePath: $thumbnailFile->path(),
                texFileCreationDetails: $pdfFile->creationDetails
            );
    }
}
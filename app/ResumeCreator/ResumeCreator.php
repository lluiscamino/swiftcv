<?php

namespace App\ResumeCreator;

use App\ResumeTemplates\TemplateType;
use App\ResumeTemplates\Variables\ResumeVariables;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RuntimeException;
use Spatie\TemporaryDirectory\Exceptions\PathAlreadyExists;
use Spatie\TemporaryDirectory\TemporaryDirectory;

readonly class ResumeCreator
{
    public function __construct(private TempResumeFilesCreator $tempResumeFilesCreator)
    {
    }

    /**
     * @param TemplateType[] $templateTypes
     * @return Resume[]
     */
    public function createResumes(array $templateTypes, ResumeVariables $variables): array
    {
        $tmpDir = self::createTemporaryDirectory();
        $resumes = $this->tempResumeFilesCreator->createResumeFiles($tmpDir, $templateTypes, $variables);
        return self::saveResumesToPermanentDisk($resumes);
    }

    private static function createTemporaryDirectory(): TemporaryDirectory
    {
        try {
            return (new TemporaryDirectory())
                ->deleteWhenDestroyed()
                ->create();
        } catch (PathAlreadyExists $e) {
            throw new RuntimeException("Unable to create temporary directory", [
                'exception' => $e,
            ]);
        }
    }

    /**
     * @param TempResume[] $tempResumes
     * @return Resume[] resumes with paths saved to permanent disk
     */
    private static function saveResumesToPermanentDisk(array $tempResumes): array
    {
        $path = 'resumes/' . Str::orderedUuid();
        $resumes = [];
        foreach ($tempResumes as $tempResume) {
            $resumePath = "$path/{$tempResume->templateType->name}";
            self::saveDebugDetailsFile($tempResume, $resumePath);
            $texFileUrl = self::saveTexFileAndGeneratePublicUrl($tempResume, $resumePath);
            if ($tempResume->successful) {
                $resumes[] = new Resume(
                    templateType: $tempResume->templateType,
                    texFileUrl: $texFileUrl,
                    pdfFileUrl: self::savePdfFileAndGeneratePublicUrl($tempResume, $resumePath),
                    thumbnailUrl: self::saveThumbnailFileAndGeneratePublicUrl($tempResume, $resumePath),
                );
            }
        }
        return $resumes;
    }

    private static function saveDebugDetailsFile(TempResume $tempResume, string $path): void
    {
        Storage::put("$path/debug.md", $tempResume->texFileCreationDetails->toMarkdown());
    }

    private static function saveTexFileAndGeneratePublicUrl(TempResume $tempResume, string $path): string
    {
        return self::saveToDiskAndGeneratePublicUrl($tempResume->texFilePath, $path, 'template.tex');
    }

    private static function savePdfFileAndGeneratePublicUrl(TempResume $tempResume, string $path): string
    {
        return self::saveToDiskAndGeneratePublicUrl($tempResume->pdfFilePath(), $path, 'resume.pdf');
    }

    private static function saveThumbnailFileAndGeneratePublicUrl(TempResume $tempResume, string $path): string
    {
        return self::saveToDiskAndGeneratePublicUrl($tempResume->thumbnailFilePath(), $path, 'thumbnail.png');
    }

    private static function saveToDiskAndGeneratePublicUrl(
        string $tempFilePath,
        string $newFilePath,
        string $newFileName
    ): string
    {
        $diskPath = Storage::putFileAs($newFilePath, new File($tempFilePath), $newFileName);
        return Storage::temporaryUrl($diskPath, now()->addHours(8));
    }
}
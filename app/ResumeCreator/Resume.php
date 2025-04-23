<?php

namespace App\ResumeCreator;

use App\ResumeTemplates\TemplateType;
use App\Utils\GeneratesToString;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

readonly class Resume
{
    use GeneratesToString;

    private function __construct(
        public TemplateType $templateType,
        public string       $texFileUrl,
        public string       $pdfFileUrl,
        public string       $thumbnailUrl
    )
    {
    }

    public static function createFromTempResume(TempResume $tempResume, string $path): Resume
    {
        $path = "$path/{$tempResume->templateType->name}";
        return new Resume(
            $tempResume->templateType,
            self::saveToDiskAndGeneratePublicUrl($tempResume->texFilePath, $path, 'template.tex'),
            self::saveToDiskAndGeneratePublicUrl($tempResume->pdfFilePath, $path, 'resume.pdf'),
            self::saveToDiskAndGeneratePublicUrl($tempResume->thumbnailFilePath, $path, 'thumbnail.png')
        );
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
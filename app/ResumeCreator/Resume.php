<?php

namespace App\ResumeCreator;

use App\ResumeTemplates\TemplateType;
use App\Utils\GeneratesToString;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use InvalidArgumentException;

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

    /**
     * @throws InvalidArgumentException if the input array `$values` does not represent a valid {@link Resume}.
     */
    public static function createFromSerializedArray(array $values): Resume
    {
        return new Resume(
            self::getTemplateTypeOrThrow($values),
            self::getFieldOrThrow($values, 'texFileUrl'),
            self::getFieldOrThrow($values, 'pdfFileUrl'),
            self::getFieldOrThrow($values, 'thumbnailUrl')
        );
    }

    /**
     * @throws InvalidArgumentException if `templateType` is missing from `$values` array or is not a valid backing
     * value for {@link TemplateType}.
     */
    private static function getTemplateTypeOrThrow(array $values): TemplateType
    {
        $backingValue = self::getFieldOrThrow($values, 'templateType');
        $templateType = TemplateType::tryFrom($backingValue);
        if ($templateType === null) {
            throw new InvalidArgumentException("Invalid template type '$backingValue'!");
        }
        return $templateType;
    }

    /**
     * @throws InvalidArgumentException if `$field` is missing from `$values` array.
     */
    private static function getFieldOrThrow(array $values, string $field): string
    {
        if (!array_key_exists($field, $values) || $values[$field] === null) {
            throw new InvalidArgumentException("Missing field $field in input array!");
        }
        return $values[$field];
    }
}
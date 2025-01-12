<?php

namespace App\ResumeCreator;

use App\ResumeTemplates\TemplateType;

readonly class TempResume
{
    public function __construct(
        public TemplateType $templateType,
        public string       $texFilePath,
        public string       $pdfFilePath,
        public string       $thumbnailFilePath
    )
    {
    }
}
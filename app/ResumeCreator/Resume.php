<?php

namespace App\ResumeCreator;

use App\ResumeTemplates\TemplateType;
use App\Utils\GeneratesToString;

readonly class Resume
{
    use GeneratesToString;

    public function __construct(
        public TemplateType $templateType,
        public string       $texFileUrl,
        public string       $pdfFileUrl,
        public string       $thumbnailUrl
    )
    {
    }
}
<?php

namespace App\ResumeTemplates\Variables;

use App\Tex\EscapesTexStrings;

readonly class Project
{
    use EscapesTexStrings;

    public function __construct(
        private string   $name,
        public ?string   $link,
        public DateRange $dateRange,
        private array    $description)
    {
    }

    public function getNameEscaped(): string
    {
        return $this->texEscape($this->name);
    }

    public function getDescriptionEscaped(): array
    {
        return $this->texEscapeArray($this->description);
    }
}
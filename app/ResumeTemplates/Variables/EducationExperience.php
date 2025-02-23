<?php

namespace App\ResumeTemplates\Variables;

use App\Tex\EscapesTexStrings;

readonly class EducationExperience
{
    use EscapesTexStrings;

    public function __construct(
        private string   $university,
        private string   $degree,
        public DateRange $dateRange,
        private ?string  $location,
        private array    $description
    )
    {
    }

    public function getUniversityEscaped(): string
    {
        return $this->texEscape($this->university);
    }

    public function getDegreeEscaped(): string
    {
        return $this->texEscape($this->degree);
    }

    public function getLocationEscaped(): ?string
    {
        return $this->texEscape($this->location);
    }

    public function getDescriptionEscaped(): array
    {
        return $this->texEscapeArray($this->description);
    }
}
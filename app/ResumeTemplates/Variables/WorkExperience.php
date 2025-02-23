<?php

namespace App\ResumeTemplates\Variables;

use App\Tex\EscapesTexStrings;

readonly class WorkExperience
{
    use EscapesTexStrings;

    /** @param string[] $description */
    public function __construct(
        private string   $company,
        private ?string  $jobTitle,
        public DateRange $dateRange,
        private ?string  $location,
        private array    $description
    )
    {
    }

    public function getCompanyEscaped(): string
    {
        return $this->texEscape($this->company);
    }

    public function getJobTitleEscaped(): ?string
    {
        return $this->texEscape($this->jobTitle);
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
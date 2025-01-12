<?php

namespace App\ResumeTemplates\Variables;

readonly class WorkExperience
{
    /** @param string[] $description */
    public function __construct(
        public string    $company,
        public ?string   $jobTitle,
        public DateRange $dateRange,
        public ?string   $location,
        public array     $description
    )
    {
    }
}
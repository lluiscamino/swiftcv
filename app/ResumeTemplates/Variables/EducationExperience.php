<?php

namespace App\ResumeTemplates\Variables;

readonly class EducationExperience
{
    public function __construct(
        public string    $university,
        public string    $degree,
        public DateRange $dateRange,
        public ?string   $location,
        public array     $description
    )
    {
    }
}
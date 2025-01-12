<?php

namespace App\ResumeTemplates\Variables;

use DateTime;

readonly class EducationExperience
{
    public function __construct(
        public string    $university,
        public string    $degree,
        public DateTime  $startDate,
        public ?DateTime $endDate,
        public ?string   $location,
        public array     $description
    )
    {
    }
}
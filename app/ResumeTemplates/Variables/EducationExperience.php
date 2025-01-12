<?php

namespace App\ResumeTemplates\Variables;

use DateTime;

readonly class EducationExperience // TODO: Location
{
    public function __construct(
        public string    $university,
        public string    $degree,
        public DateTime  $startDate,
        public ?DateTime $endDate,
        public array     $description
    )
    {
    }
}
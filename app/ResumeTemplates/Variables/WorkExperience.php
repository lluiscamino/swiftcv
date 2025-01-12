<?php

namespace App\ResumeTemplates\Variables;

use DateTime;

readonly class WorkExperience
{
    /** @param string[] $description */
    public function __construct(
        public string    $company,
        public ?string   $jobTitle,
        public DateTime  $startDate,
        public ?DateTime $endDate,
        public ?string   $location,
        public array     $description
    )
    {
    }
}
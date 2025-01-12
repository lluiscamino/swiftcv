<?php

namespace App\ResumeTemplates\Variables;

use DateTime;

readonly class Project
{
    public function __construct(
        public string    $name,
        public string    $link,
        public DateTime  $startDate,
        public ?DateTime $endDate,
        public array     $description)
    {
    }
}
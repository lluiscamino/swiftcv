<?php

namespace App\ResumeTemplates\Variables;

readonly class Project
{
    public function __construct(
        public string    $name,
        public string    $link,
        public DateRange $dateRange,
        public array     $description)
    {
    }
}
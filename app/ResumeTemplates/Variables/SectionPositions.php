<?php

namespace App\ResumeTemplates\Variables;

readonly class SectionPositions
{
    public function __construct(
        public int $workExperiencesPosition,
        public int $educationExperiencesPosition,
        public int $projectsPosition,
        public int $skillsPosition
    )
    {
    }
}
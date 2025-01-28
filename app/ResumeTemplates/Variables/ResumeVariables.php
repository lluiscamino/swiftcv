<?php

namespace App\ResumeTemplates\Variables;

readonly class ResumeVariables
{
    /**
     * @param WorkExperience[] $workExperiences
     * @param EducationExperience[] $educationExperiences
     * @param Project[] $projects
     * @param Skill[] $skills
     */
    public function __construct(
        public ContactInfo      $contactInfo,
        public array            $workExperiences,
        public array            $educationExperiences,
        public array            $projects,
        public array            $skills,
        public SectionPositions $positions
    )
    {
    }

    public function toArray(): array
    {
        return ['vars' => $this];
    }
}
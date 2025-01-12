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
        public string $name,
        public string $email,
        public string $phoneNumber,
        public string $linkedinUsername,
        public string $githubUsername,
        public array  $workExperiences,
        public array  $educationExperiences,
        public array  $projects,
        public array  $skills,
    )
    {
    }

    public function toArray(): array
    {
        return ['vars' => $this];
    }
}
<?php

namespace App\ResumeTemplates\Utils;

use App\ResumeTemplates\Variables\ResumeVariables;
use Illuminate\Support\Facades\Blade;

readonly class SectionsRenderer
{
    private function __construct(
        private string $workExperiencesResourcePath,
        private string $educationExperiencesResourcePath,
        private string $projectsPath,
        private string $skillsPath
    )
    {
    }

    public function renderSectionsInOrder(ResumeVariables $vars): string
    {
        $paths = $this->createPositionToPathArray($vars);
        ksort($paths);
        $data = ['vars' => $vars];
        return join('', array_map(fn(string $path) => Blade::render($path, $data), $paths));
    }

    /** @return array<int, string> */
    private function createPositionToPathArray(ResumeVariables $vars): array
    {
        return [
            $vars->positions->workExperiencesPosition => $this->workExperiencesResourcePath,
            $vars->positions->educationExperiencesPosition => $this->educationExperiencesResourcePath,
            $vars->positions->projectsPosition => $this->projectsPath,
            $vars->positions->skillsPosition => $this->skillsPath,
        ];
    }

    public static function createWithDefaultPaths(string $basePath): self
    {
        return new self(
            workExperiencesResourcePath: "$basePath/work",
            educationExperiencesResourcePath: "$basePath/education",
            projectsPath: "$basePath/projects",
            skillsPath: "$basePath/skills"
        );
    }
}
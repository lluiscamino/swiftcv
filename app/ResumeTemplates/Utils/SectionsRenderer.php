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
        return self::orderAndRenderSections($vars, [
            $vars->positions->workExperiencesPosition => $this->workExperiencesResourcePath,
            $vars->positions->educationExperiencesPosition => $this->educationExperiencesResourcePath,
            $vars->positions->projectsPosition => $this->projectsPath,
            $vars->positions->skillsPosition => $this->skillsPath,
        ]);
    }

    public function renderLeftSideSectionsInOrder(ResumeVariables $vars): string
    {
        return self::orderAndRenderSections($vars, [
            $vars->positions->educationExperiencesPosition => $this->educationExperiencesResourcePath,
            $vars->positions->skillsPosition => $this->skillsPath,
        ]);
    }

    public function renderRightSideSectionsInOrder(ResumeVariables $vars): string
    {
        return self::orderAndRenderSections($vars, [
            $vars->positions->workExperiencesPosition => $this->workExperiencesResourcePath,
            $vars->positions->projectsPosition => $this->projectsPath,
        ]);
    }

    /** @param array $positionsToResourcePathMap array<int, string> */
    private static function orderAndRenderSections(ResumeVariables $vars, array $positionsToResourcePathMap): string
    {
        ksort($positionsToResourcePathMap);
        $data = ['vars' => $vars];
        return join('', array_map(fn(string $path) => Blade::render($path, $data), $positionsToResourcePathMap));
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
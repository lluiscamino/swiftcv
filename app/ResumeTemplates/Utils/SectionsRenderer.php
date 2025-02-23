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
            ResumeSection::create($this->workExperiencesResourcePath, $vars->positions->workExperiencesPosition, $vars->workExperiences),
            ResumeSection::create($this->educationExperiencesResourcePath, $vars->positions->educationExperiencesPosition, $vars->educationExperiences),
            ResumeSection::create($this->projectsPath, $vars->positions->projectsPosition, $vars->projects),
            ResumeSection::create($this->skillsPath, $vars->positions->skillsPosition, $vars->skills),
        ]);
    }

    public function renderLeftSideSectionsInOrder(ResumeVariables $vars): string
    {
        return self::orderAndRenderSections($vars, [
            ResumeSection::create($this->educationExperiencesResourcePath, $vars->positions->educationExperiencesPosition, $vars->educationExperiences),
            ResumeSection::create($this->skillsPath, $vars->positions->skillsPosition, $vars->skills),
        ]);
    }

    public function renderRightSideSectionsInOrder(ResumeVariables $vars): string
    {
        return self::orderAndRenderSections($vars, [
            ResumeSection::create($this->workExperiencesResourcePath, $vars->positions->workExperiencesPosition, $vars->workExperiences),
            ResumeSection::create($this->projectsPath, $vars->positions->projectsPosition, $vars->projects),
        ]);
    }

    /** @param array $sections ResumeSection[] */
    private static function orderAndRenderSections(ResumeVariables $vars, array $sections): string
    {
        $sections = array_filter($sections, fn(ResumeSection $section) => $section->visible);
        usort($sections, fn(ResumeSection $a, ResumeSection $b) => $a->compareTo($b));
        $data = ['vars' => $vars];
        return join('', array_map(fn(ResumeSection $section) => Blade::render($section->resourcePath, $data), $sections));
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

/** @access private */
readonly class ResumeSection
{
    private function __construct(
        public string $resourcePath,
        private int   $position,
        public string $visible
    )
    {
    }

    public function compareTo(ResumeSection $other): int
    {
        return $this->position <=> $other->position;
    }

    public static function create(string $resourcePath, int $position, array $subSections): self
    {
        return new self($resourcePath, $position, count($subSections) > 0);
    }
}

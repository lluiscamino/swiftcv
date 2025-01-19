<?php

namespace App\Livewire\Forms;

use App\Livewire\ResumeSectionType;
use App\ResumeTemplates\Variables\EducationExperience;
use App\ResumeTemplates\Variables\Project;
use App\ResumeTemplates\Variables\ResumeVariables;
use App\ResumeTemplates\Variables\SectionPositions;
use App\ResumeTemplates\Variables\Skill;
use App\ResumeTemplates\Variables\WorkExperience;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Url;
use Livewire\Form;

class CreateResumeForm extends Form
{
    use GetPropertyValues;

    #[Url]
    public string $name = '', $email = '', $phoneNumber = '';
    #[Url]
    public array
        $workExperiences = [[]],
        $educationExperiences = [[]],
        $projects = [[]],
        $skills = [[]];

    #[Url]
    public array $sectionPositions = [
        ResumeSectionType::WORK_EXPERIENCE->value => 0,
        ResumeSectionType::EDUCATION_EXPERIENCE->value => 1,
        ResumeSectionType::PROJECT->value => 2,
        ResumeSectionType::SKILLS->value => 3,
    ];

    protected array $validationAttributes = [
        'email' => 'email address',
        'phoneNumber' => 'phone number',
        'workExperiences.*.company' => 'company',
        'workExperiences.*.jobTitle' => 'job title',
        'workExperiences.*.startDate' => 'start date',
        'workExperiences.*.endDate' => 'end date',
        'workExperiences.*.location' => 'location',
        'educationExperiences.*.institution' => 'institution',
        'educationExperiences.*.degree' => 'degree',
        'educationExperiences.*.startDate' => 'start date',
        'educationExperiences.*.endDate' => 'end date',
        'educationExperiences.*.location' => 'location',
        'projects.*.name' => 'project name',
        'projects.*.link' => 'link',
        'projects.*.startDate' => 'start date',
        'projects.*.endDate' => 'end date',
        'skills.*.name' => 'skill name',
        'skills.*.description' => 'description',
    ];

    /** @return array<string, ValidationRule|array|string> */
    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'phoneNumber' => ['nullable', 'string', 'max:255'],
            'workExperiences' => ['array'],
            'workExperiences.*.company' => ['required', 'string'],
            'workExperiences.*.jobTitle' => ['required', 'string'],
            'workExperiences.*.startDate' => ['required', 'date'],
            'workExperiences.*.endDate' => ['nullable', 'date'],
            'workExperiences.*.location' => ['nullable', 'string'],
            'educationExperiences' => ['array'],
            'educationExperiences.*.institution' => ['required', 'string'],
            'educationExperiences.*.degree' => ['required', 'string'],
            'educationExperiences.*.startDate' => ['required', 'date'],
            'educationExperiences.*.endDate' => ['nullable', 'date'],
            'educationExperiences.*.location' => ['nullable', 'string'],
            'projects' => ['array'],
            'projects.*.name' => ['required', 'string'],
            'projects.*.link' => ['nullable', 'string'],
            'projects.*.startDate' => ['nullable', 'date'],
            'projects.*.endDate' => ['nullable', 'date'],
            'skills' => ['array'],
            'skills.*.name' => ['required', 'string'],
            'skills.*.description' => ['required', 'string'],
        ];
    }

    public function getResumeVariables(): ResumeVariables
    {
        return new ResumeVariables(
            name: $this->getPropertyValue('name'),
            email: $this->getPropertyValue('email'),
            phoneNumber: $this->getPropertyValue('phoneNumber'),
            linkedinUsername: 'lluiscamino',
            githubUsername: 'lluiscamino',
            workExperiences: $this->getWorkExperiences(),
            educationExperiences: $this->getEducationExperiences(),
            projects: $this->getProjectExperiences(),
            skills: $this->getSkills(),
            positions: $this->getSectionPositions(),
        );
    }

    /** @return WorkExperience[] */
    private function getWorkExperiences(): array
    {
        return array_map(fn($key) => new WorkExperience(
            company: $this->getPropertyValue("workExperiences.$key.company"),
            jobTitle: $this->getPropertyValue("workExperiences.$key.jobTitle"),
            dateRange: $this->getDateRangePropertyValue("workExperiences.$key"),
            location: $this->getPropertyValue("workExperiences.$key.location"),
            description: ['Developed many features', 'Used the gym', 'blah blah blah']
        ), array_keys($this->getPropertyValue('workExperiences')));
    }

    /**  @return EducationExperience[] */
    private function getEducationExperiences(): array
    {
        return array_map(fn($key) => new EducationExperience(
            university: $this->getPropertyValue("educationExperiences.$key.institution"),
            degree: $this->getPropertyValue("educationExperiences.$key.degree"),
            dateRange: $this->getDateRangePropertyValue("educationExperiences.$key"),
            location: $this->getPropertyValue("educationExperiences.$key.location"),
            description: ['Didnt study much', 'Went to 2 parties']
        ), array_keys($this->getPropertyValue('educationExperiences')));
    }

    /** @return Project[] */
    private function getProjectExperiences(): array
    {
        return array_map(fn($key) => new Project(
            name: $this->getPropertyValue("projects.$key.name"),
            link: $this->getPropertyValue("projects.$key.link"),
            dateRange: $this->getDateRangePropertyValue("projects.$key"),
            description: ['Worked on a team of 4 to solve a challenge', 'Met my ex-girlfriend']
        ), array_keys($this->getPropertyValue('projects')));
    }

    /** @return Skill[] */
    private function getSkills(): array
    {
        return array_map(fn($key) => new Skill(
            name: $this->getPropertyValue("skills.$key.name"),
            description: $this->getPropertyValue("skills.$key.description")
        ), array_keys($this->getPropertyValue('skills')));
    }

    public function getSectionPositions(): SectionPositions
    {
        return new SectionPositions(
            workExperiencesPosition: $this->getSectionPosition(ResumeSectionType::WORK_EXPERIENCE),
            educationExperiencesPosition: $this->getSectionPosition(ResumeSectionType::EDUCATION_EXPERIENCE),
            projectsPosition: $this->getSectionPosition(ResumeSectionType::PROJECT),
            skillsPosition: $this->getSectionPosition(ResumeSectionType::SKILLS)
        );
    }

    /**
     * @return ResumeSectionType[]
     * @noinspection PhpUnused
     */
    public function getOrderedSectionTypes(): array
    {
        asort($this->sectionPositions);
        return array_map(fn($value) => ResumeSectionType::from($value), array_keys($this->sectionPositions));
    }

    public function moveSectionUp(ResumeSectionType $resumeSectionType): void
    {
        if ($this->isAtTop($resumeSectionType)) {
            Log::warning("Cannot move section $resumeSectionType->name up: already at the top.");
            return;
        }
        $this->changeSectionPosition($resumeSectionType, -1);
    }

    public function moveSectionDown(ResumeSectionType $resumeSectionType): void
    {
        if ($this->isAtBottom($resumeSectionType)) {
            Log::warning("Cannot move section $resumeSectionType->name down: already at the bottom.");
            return;
        }
        $this->changeSectionPosition($resumeSectionType, +1);
    }

    private function changeSectionPosition(ResumeSectionType $resumeSectionType, int $offset): void
    {
        $currentPosition = $this->getSectionPosition($resumeSectionType);
        $newPosition = $currentPosition + $offset;
        foreach ($this->sectionPositions as $typeValue => $position) {
            if ($position == $newPosition) {
                $this->sectionPositions[$typeValue] = $currentPosition;
                $this->sectionPositions[$resumeSectionType->value] = $newPosition;
                break;
            }
        }
    }

    public function isAtTop(ResumeSectionType $resumeSectionType): bool
    {
        return $this->getSectionPosition($resumeSectionType) == 0;
    }

    public function isAtBottom(ResumeSectionType $resumeSectionType): bool
    {
        return $this->getSectionPosition($resumeSectionType) == count($this->sectionPositions) - 1;
    }

    private function getSectionPosition(ResumeSectionType $resumeSectionType): int
    {
        return $this->sectionPositions[$resumeSectionType->value];
    }

    public function getSearchParams(): string
    {
        return '?' . join('&', [
                'name=' . urlencode($this->name),
                'email=' . urlencode($this->email),
                'phoneNumber=' . urlencode($this->phoneNumber),
                self::sectionsToUrl('workExperiences', $this->workExperiences),
                self::sectionsToUrl('educationExperiences', $this->educationExperiences),
                self::sectionsToUrl('projects', $this->projects),
                self::sectionsToUrl('skills', $this->skills),
                $this->sectionPositionsToUrl()
            ]);
    }

    private static function sectionsToUrl(string $name, array $sections): string
    {
        $result = [];
        foreach ($sections as $index => $section) {
            foreach ($section as $key => $value) {
                $result[] = $name . '[' . $index . '][' . $key . ']=' . urlencode($value);
            }
        }
        return join('&', $result);
    }

    private function sectionPositionsToUrl(): string
    {
        $result = [];
        foreach ($this->sectionPositions as $sectionType => $position) {
            $result[] = 'sectionPositions[' . $sectionType . ']=' . $position;
        }
        return join('&', $result);
    }
}

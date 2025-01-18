<?php

namespace App\Livewire\Forms;

use App\ResumeTemplates\Variables\EducationExperience;
use App\ResumeTemplates\Variables\Project;
use App\ResumeTemplates\Variables\ResumeVariables;
use App\ResumeTemplates\Variables\Skill;
use App\ResumeTemplates\Variables\WorkExperience;
use Illuminate\Contracts\Validation\ValidationRule;
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
            skills: $this->getSkills()
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

    public function getSearchParams(): string
    {
        $result = '?name=' . urlencode($this->name) . '&email=' . urlencode($this->email) .
            '&phoneNumber=' . urlencode($this->phoneNumber) . '&';
        $result .= self::sectionsToUrl('workExperiences', $this->workExperiences) . '&';
        $result .= self::sectionsToUrl('educationExperiences', $this->educationExperiences) . '&';
        $result .= self::sectionsToUrl('projects', $this->projects) . '&';
        $result .= self::sectionsToUrl('skills', $this->skills);
        return $result;
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
}

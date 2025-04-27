<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateResumeForm;
use App\ResumeCreator\ResumeCreator;
use App\ResumeTemplates\TemplateType;
use Illuminate\View\View;
use Livewire\Component;

class CreateResume extends Component
{
    public CreateResumeForm $form;

    /** @noinspection PhpUnused */
    public function addWorkExperience(): void
    {
        $this->form->workExperiences[] = [];
    }

    /** @noinspection PhpUnused */
    public function removeWorkExperience(int $key): void
    {
        unset($this->form->workExperiences[$key]);
    }

    /** @noinspection PhpUnused */
    public function addEducationExperience(): void
    {
        $this->form->educationExperiences[] = [];
    }

    /** @noinspection PhpUnused */
    public function removeEducationExperience(int $key): void
    {
        unset($this->form->educationExperiences[$key]);
    }

    /** @noinspection PhpUnused */
    public function addProject(): void
    {
        $this->form->projects[] = [];
    }

    /** @noinspection PhpUnused */
    public function removeProject(int $key): void
    {
        unset($this->form->projects[$key]);
    }

    /** @noinspection PhpUnused */
    public function addSkill(): void
    {
        $this->form->skills[] = [];
    }

    /** @noinspection PhpUnused */
    public function removeSkill(int $key): void
    {
        unset($this->form->skills[$key]);
    }

    /** @noinspection PhpUnused */
    public function moveSectionUp(ResumeSectionType $section): void
    {
        $this->form->moveSectionUp($section);
    }

    /** @noinspection PhpUnused */
    public function moveSectionDown(ResumeSectionType $section): void
    {
        $this->form->moveSectionDown($section);
    }

    public function save(ResumeCreator $resumeCreator): void
    {
        $this->validate();
        $resumes = $resumeCreator->createResumes(TemplateType::orderedCases(), $this->form->getResumeVariables());
        session()->flash('resumes', $resumes);
        session()->flash('formUrl', '/create-resume' . $this->form->getSearchParams());
        $this->redirectRoute('results');
    }

    public function render(): View
    {
        return view('livewire.create-resume');
    }
}

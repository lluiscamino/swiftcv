<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateResumeForm;
use App\ResumeCreator\ResumeCreator;
use App\ResumeTemplates\TemplateType;
use Livewire\Component;

class CreateResume extends Component
{
    public CreateResumeForm $form;
    public array $numSections = [
        ResumeSectionType::WORK_EXPERIENCE->value => 1,
        ResumeSectionType::EDUCATION_EXPERIENCE->value => 1,
        ResumeSectionType::PROJECT->value => 1,
        ResumeSectionType::SKILLS->value => 1,
    ];

    public function addSection(ResumeSectionType $type): void
    {
        $this->numSections[$type->value]++;
    }

    public function save(ResumeCreator $resumeCreator)
    {
        $this->validate();
        $resumes = $resumeCreator->createResumes(TemplateType::cases(), $this->form->getResumeVariables());
        session()->flash('resumes', $resumes);
        $this->redirect('/results');
    }

    public function render()
    {
        return view('livewire.create-resume');
    }
}

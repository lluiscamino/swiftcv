<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateResumeForm;

enum ResumeSectionType: int
{
    case WORK_EXPERIENCE = 0;
    case EDUCATION_EXPERIENCE = 1;
    case PROJECT = 2;
    case SKILLS = 3;

    public function getId(): string
    {
        return match ($this) {
            self::WORK_EXPERIENCE => 'workExperience',
            self::EDUCATION_EXPERIENCE => 'educationExperience',
            self::PROJECT => 'projects',
            self::SKILLS => 'skills',
        };
    }

    public function getTitle(): string
    {
        return match ($this) {
            self::WORK_EXPERIENCE => 'Work experience',
            self::EDUCATION_EXPERIENCE => 'Education',
            self::PROJECT => 'Projects',
            self::SKILLS => 'Skills',
        };
    }

    public function getAddButtonLabel(): string
    {
        return match ($this) {
            self::WORK_EXPERIENCE => 'Add experience',
            self::EDUCATION_EXPERIENCE => 'Add education',
            self::PROJECT => 'Add project',
            self::SKILLS => 'Add skill',
        };
    }

    public function getAddButtonCallback(): string
    {
        return match ($this) {
            self::WORK_EXPERIENCE => 'addWorkExperience()',
            self::EDUCATION_EXPERIENCE => 'addEducationExperience()',
            self::PROJECT => 'addProject()',
            self::SKILLS => 'addSkill()',
        };
    }

    public function getRemoveButtonCallback($key): string
    {
        return match ($this) {
            self::WORK_EXPERIENCE => "removeWorkExperience($key)",
            self::EDUCATION_EXPERIENCE => "removeEducationExperience($key)",
            self::PROJECT => "removeProject($key)",
            self::SKILLS => "removeSkill($key)",
        };
    }

    public function getEntries(CreateResumeForm $form): array
    {
        return match ($this) {
            self::WORK_EXPERIENCE => $form->workExperiences,
            self::EDUCATION_EXPERIENCE => $form->educationExperiences,
            self::PROJECT => $form->projects,
            self::SKILLS => $form->skills,
        };
    }

    public function shouldShowMoveUpButton(CreateResumeForm $form): bool
    {
        return !$form->isAtTop($this);
    }

    public function shouldShouldMoveDownButton(CreateResumeForm $form): bool
    {
        return !$form->isAtBottom($this);
    }
}

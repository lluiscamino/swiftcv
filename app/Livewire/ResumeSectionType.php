<?php

namespace App\Livewire;

enum ResumeSectionType: int
{
    case WORK_EXPERIENCE = 0;
    case EDUCATION_EXPERIENCE = 1;
    case PROJECT = 2;
    case SKILLS = 3;
}

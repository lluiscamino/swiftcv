<?php

namespace App\ResumeTemplates\Variables;

class Skill
{
    public function __construct(
        public string $name,
        public string $description,
    )
    {
    }
}
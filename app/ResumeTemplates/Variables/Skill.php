<?php

namespace App\ResumeTemplates\Variables;

use App\Tex\EscapesTexStrings;

readonly class Skill
{
    use EscapesTexStrings;

    public function __construct(
        private string $name,
        private string $description,
    )
    {
    }

    public function getNameEscaped(): string
    {
        return $this->texEscape($this->name);
    }

    public function getDescriptionEscaped(): string
    {
        return $this->texEscape($this->description);
    }
}
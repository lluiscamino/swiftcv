<?php

namespace App\ResumeTemplates\Variables;

use App\Tex\EscapesTexStrings;

readonly class ContactInfo
{
    use EscapesTexStrings;

    public function __construct(
        private string $name,
        public ?string $email,
        public ?string $phoneNumber,
        public ?string $website,
        public ?string $linkedinUsername,
        public ?string $githubUsername)
    {
    }

    public function getNameEscaped(): string
    {
        return $this->texEscape($this->name);
    }
}
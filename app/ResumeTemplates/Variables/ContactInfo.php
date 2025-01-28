<?php

namespace App\ResumeTemplates\Variables;

readonly class ContactInfo
{
    public function __construct(
        public string $name,
        public string $email,
        public string $phoneNumber,
        public string $linkedinUsername,
        public string $githubUsername)
    {
    }
}
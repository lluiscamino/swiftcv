<?php

namespace App\ResumeTemplates;

use App\Files\ValidFile;

enum TemplateType
{
    case BASE_ROVER;
    case JAKES_RESUME;
    case DPHANG;
    case MCDOWELL_CV;

    public function getTemplateContent(): string
    {
        return $this->getTemplateFile()->content();
    }

    /**
     * @return array<string, string>
     */
    public function getExtraFilesNameToContentMap(): array
    {
        $result = [];
        foreach ($this->getExtraFiles() as $extraFile) {
            $result[$extraFile->baseName()] = $extraFile->content();
        }
        return $result;
    }

    public function getUserFriendlyName(): string
    {
        return match ($this) {
            self::BASE_ROVER => 'Base Rover',
            self::JAKES_RESUME => 'Jake\'s Resume',
            self::DPHANG => 'Dphang\'s Resume',
            self::MCDOWELL_CV => 'McDowell CV',
        };
    }

    private function getTemplateFile(): ValidFile
    {
        return match ($this) {
            self::BASE_ROVER => ValidFile::fromAppPath('ResumeTemplates/Resources/base-rover.blade.php'),
            self::JAKES_RESUME => ValidFile::fromAppPath('ResumeTemplates/Resources/jakes-resume.blade.php'),
            self::DPHANG => ValidFile::fromAppPath('ResumeTemplates/Resources/dphang.blade.php'),
            self::MCDOWELL_CV => ValidFile::fromAppPath('ResumeTemplates/Resources/mcdowell-cv/mcdowell-cv.blade.php')
        };
    }

    /** @return ValidFile[] */
    private function getExtraFiles(): array
    {
        return match ($this) {
            self::MCDOWELL_CV => [
                ValidFile::fromAppPath('ResumeTemplates/Resources/mcdowell-cv/mcdowell-cv.cls')
            ],
            default => []
        };
    }
}

<?php

namespace App\ResumeTemplates;

use App\Files\ValidFile;
use App\Tex\Compilers\PdfLatexCompiler;
use App\Tex\Compilers\TexCompiler;
use App\Tex\Compilers\XelatexCompiler;
use Illuminate\Support\Facades\App;

enum TemplateType: string
{
    case BASE_ROVER = 'base-rover';
    case JAKES_RESUME = 'jakes-resume';
    case DPHANG = 'dphang';
    case MCDOWELL_CV = 'mcdowell-cv';
    case DEEDY_RESUME = 'deedy-resume';

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
            self::DEEDY_RESUME => 'Deedy\'s Resume',
        };
    }

    public function getCompiler(): TexCompiler
    {
        return match ($this) {
            self::BASE_ROVER, self::JAKES_RESUME, self::DPHANG => App::make(PdfLatexCompiler::class),
            self::MCDOWELL_CV, self::DEEDY_RESUME => App::make(XelatexCompiler::class)
        };
    }

    private function getTemplateFile(): ValidFile
    {
        return match ($this) {
            self::BASE_ROVER => ValidFile::fromAppPath('ResumeTemplates/Resources/base-rover/base-rover.blade.php'),
            self::JAKES_RESUME => ValidFile::fromAppPath('ResumeTemplates/Resources/jakes-resume/jakes-resume.blade.php'),
            self::DPHANG => ValidFile::fromAppPath('ResumeTemplates/Resources/dphang/dphang.blade.php'),
            self::MCDOWELL_CV => ValidFile::fromAppPath('ResumeTemplates/Resources/mcdowell-cv/mcdowell-cv.blade.php'),
            self::DEEDY_RESUME => ValidFile::fromAppPath('ResumeTemplates/Resources/deedy-resume/deedy-resume.blade.php'),
        };
    }

    /** @return ValidFile[] */
    private function getExtraFiles(): array
    {
        return match ($this) {
            self::MCDOWELL_CV => [
                ValidFile::fromAppPath('ResumeTemplates/Resources/mcdowell-cv/mcdowell-cv.cls')
            ],
            self::DEEDY_RESUME => [
                ValidFile::fromAppPath('ResumeTemplates/Resources/deedy-resume/deedy-resume.cls')
            ],
            default => []
        };
    }
}

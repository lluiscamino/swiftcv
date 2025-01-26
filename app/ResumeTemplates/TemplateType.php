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

    public function getAuthorName(): string
    {
        return match ($this) {
            self::BASE_ROVER => 'Subidit Nandy',
            self::JAKES_RESUME => 'Jake Gutierrez',
            self::DPHANG => 'Daniel Phang',
            self::MCDOWELL_CV => 'Gayle Laakmann McDowell (LaTeX template: Daniil Belyakov)',
            self::DEEDY_RESUME => 'Deedy Das'
        };
    }

    public function getSourceLink(): string
    {
        return match ($this) {
            self::BASE_ROVER => 'https://github.com/subidit/rover-resume/tree/main/templates/base%20rover',
            self::JAKES_RESUME => 'https://github.com/jakegut/resume',
            self::DPHANG => 'https://github.com/dphang/resume',
            self::MCDOWELL_CV => 'https://github.com/dnl-blkv/mcdowell-cv',
            self::DEEDY_RESUME => 'https://github.com/deedy/Deedy-Resume'
        };
    }

    public function getLicenseText(): string
    {
        return match ($this) {
            self::BASE_ROVER => view('licenses/base-rover'),
            self::JAKES_RESUME => view('licenses/jakes-resume'),
            self::DPHANG => view('licenses/dphang'),
            self::MCDOWELL_CV => view('licenses/mcdowell-cv'),
            self::DEEDY_RESUME => view('licenses/deedy-resume')
        };
    }

    public function getInternalSourceLink(): string
    {
        return "/templates/$this->value#source";
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

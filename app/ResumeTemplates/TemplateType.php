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
    case AWESOME_CV = 'awesome-cv';
    case LATEX_CV_CLASSIC = 'latex-cv-classic';
    case SB2NOV_RESUME = 'sb2nov-resume';
    case BILLRYAN_RESUME = 'billryan-resume';

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
            self::AWESOME_CV => 'Awesome CV',
            self::LATEX_CV_CLASSIC => 'LaTeX CV classic',
            self::SB2NOV_RESUME => 'Software Engineer Resume',
            self::BILLRYAN_RESUME => 'Elegant Resume',
        };
    }

    public function getCompiler(): TexCompiler
    {
        return match ($this) {
            self::BASE_ROVER, self::JAKES_RESUME, self::DPHANG, self::LATEX_CV_CLASSIC, self::SB2NOV_RESUME => App::make(PdfLatexCompiler::class),
            self::MCDOWELL_CV, self::DEEDY_RESUME, self::AWESOME_CV, self::BILLRYAN_RESUME => App::make(XelatexCompiler::class)
        };
    }

    public function getAuthorName(): string
    {
        return match ($this) {
            self::BASE_ROVER => 'Subidit Nandy',
            self::JAKES_RESUME => 'Jake Gutierrez',
            self::DPHANG => 'Daniel Phang',
            self::MCDOWELL_CV => 'Gayle Laakmann McDowell (LaTeX template: Daniil Belyakov)',
            self::DEEDY_RESUME => 'Deedy Das',
            self::AWESOME_CV => 'Byungjin Park',
            self::LATEX_CV_CLASSIC => 'Jan Küster',
            self::SB2NOV_RESUME => 'Sourabh Bajaj',
            self::BILLRYAN_RESUME => 'Bill Ryan',
        };
    }

    public function getSourceLink(): string
    {
        return match ($this) {
            self::BASE_ROVER => 'https://github.com/subidit/rover-resume/tree/main/templates/base%20rover',
            self::JAKES_RESUME => 'https://github.com/jakegut/resume',
            self::DPHANG => 'https://github.com/dphang/resume',
            self::MCDOWELL_CV => 'https://github.com/dnl-blkv/mcdowell-cv',
            self::DEEDY_RESUME => 'https://github.com/deedy/Deedy-Resume',
            self::AWESOME_CV => 'https://github.com/posquit0/Awesome-CV',
            self::LATEX_CV_CLASSIC => 'https://github.com/jankapunkt/latexcv/tree/master/classic',
            self::SB2NOV_RESUME => 'https://github.com/sb2nov/resume',
            self::BILLRYAN_RESUME => 'https://github.com/billryan/resume'
        };
    }

    public function getLicenseText(): string
    {
        return view("licenses/$this->value");
    }

    public function getInternalLink(): string
    {
        return route('template', ['templateType' => $this]);
    }

    public function getInternalSourceLink(): string
    {
        return $this->getInternalLink() . '#source';
    }

    private function getTemplateFile(): ValidFile
    {
        return ValidFile::fromAppPath("ResumeTemplates/Resources/$this->value/$this->value.blade.php");
    }

    /** @return ValidFile[] */
    private function getExtraFiles(): array
    {
        return match ($this) {
            self::MCDOWELL_CV, self::DEEDY_RESUME, self::AWESOME_CV => [ValidFile::fromAppPath("ResumeTemplates/Resources/$this->value/$this->value.cls")],
            self::BILLRYAN_RESUME => [
                ValidFile::fromAppPath("ResumeTemplates/Resources/$this->value/$this->value.cls"),
                ValidFile::fromAppPath("ResumeTemplates/Resources/$this->value/fontawesome.sty"),
                ValidFile::fromAppPath("ResumeTemplates/Resources/$this->value/fonts/fontawesome/opentype/FontAwesome.otf"),
                ValidFile::fromAppPath("ResumeTemplates/Resources/$this->value/fonts/Main/Fontin-SmallCaps.otf"),
                ValidFile::fromAppPath("ResumeTemplates/Resources/$this->value/fonts/Main/texgyretermes-bold.otf"),
                ValidFile::fromAppPath("ResumeTemplates/Resources/$this->value/fonts/Main/texgyretermes-bolditalic.otf"),
                ValidFile::fromAppPath("ResumeTemplates/Resources/$this->value/fonts/Main/texgyretermes-italic.otf"),
                ValidFile::fromAppPath("ResumeTemplates/Resources/$this->value/fonts/Main/texgyretermes-regular.otf"),
                ValidFile::fromAppPath("ResumeTemplates/Resources/$this->value/fonts/fontawesome-webfont.ttf"),
            ],
            default => [],
        };
    }
}

<?php

namespace App\Blade;

use App\ResumeTemplates\TemplateType;

class BladeUtils
{
    public static function linkToTemplate(TemplateType $templateType): string
    {
        return self::link($templateType->getInternalLink(), $templateType->getUserFriendlyName());
    }

    public static function link(string $href, string $text): string
    {
        return "<a href=\"$href\" class=\"text-gray-700 hover:text-green-700 dark:text-gray-400 dark:hover:text-white\">$text</a>";
    }
}
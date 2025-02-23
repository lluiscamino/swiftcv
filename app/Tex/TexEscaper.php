<?php

namespace App\Tex;

/**
 * Class for escaping TeX special characters from a given string (typically, a string entered by the user).
 */
class TexEscaper
{
    /** @var array<string, string> */
    private static array $specialTexChars = [
        '\\' => '\textbackslash{}',
        '{' => '\{',
        '}' => '\}',
        '$' => '\$',
        '&' => '\&',
        '#' => '\#',
        '_' => '\_',
        '%' => '\%',
        '^' => '\textasciicircum{}',
        '~' => '\textasciitilde{}',
        '∼' => '\textasciitilde{}',
        '<' => '\textless{}',
        '>' => '\textgreater{}',
        '"' => '\textquotedbl{}',
        '\'' => '\textquotesingle{}'
    ];

    public static function escape(string $text): string
    {
        return strtr($text, self::$specialTexChars);
    }
}
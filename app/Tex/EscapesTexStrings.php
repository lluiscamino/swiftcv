<?php

namespace App\Tex;

trait EscapesTexStrings
{
    protected function texEscape(?string $string): ?string
    {
        return $string !== null ? TexEscaper::escape($string) : null;
    }

    protected function texEscapeArray(array $array): array
    {
        return array_map(fn(string $line) => $this->texEscape($line), $array);
    }
}
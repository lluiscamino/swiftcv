<?php

namespace App\Tex;

use Illuminate\Support\Facades\Log;

class TexSanitizer
{
    /**
     * A list of dangerous commands to be removed.
     * The key is the command name, and the value is a boolean indicating
     * whether the command takes arguments (e.g., \def, \let).
     * @var array<string, bool>
     */
    private const DANGEROUS_COMMANDS = [
        'write18' => false,
        'openout' => true,
        'read' => true,
        'write' => true,
        'newwrite' => true,
        'loop' => false,
        'repeat' => false,
        'immediate' => true,
        'openin' => true,
    ];

    /**
     * A list of dangerous packages to be removed.
     * @var string[]
     */
    private const DANGEROUS_PACKAGES = [
        'shellesc',
        'write18',
    ];

    /**
     * Sanitizes TeX content by removing dangerous commands and packages.
     */
    public function sanitize(string $texContent): string
    {
        // TODO: Use a proper TeX parser
        $sanitizedContent = self::removeDangerousPackages(self::removeDangerousCommands($texContent));
        if ($texContent !== $sanitizedContent) {
            Log::warning('Detected dangerous sequences in TeX content', [
                'texContent' => $texContent
            ]);
        }
        return $sanitizedContent;
    }

    private static function removeDangerousCommands(string $texContent): string
    {
        foreach (self::DANGEROUS_COMMANDS as $command => $hasArguments) {
            $pattern = '/\\\\' . preg_quote($command) . '\b/i';
            if ($hasArguments) {
                $pattern = '/\\\\' . preg_quote($command) . '(\s*\{[^}]*\})?/i';
            }
            $texContent = preg_replace($pattern, '', $texContent);
        }
        return $texContent;
    }

    private static function removeDangerousPackages(string $texContent): string
    {
        foreach (self::DANGEROUS_PACKAGES as $package) {
            $pattern = '/\\\\usepackage\s*\{\s*' . preg_quote($package) . '\s*\}/i';
            $texContent = preg_replace($pattern, '', $texContent);
        }

        return $texContent;
    }
}
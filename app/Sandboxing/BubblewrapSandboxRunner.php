<?php

namespace App\Sandboxing;

use Illuminate\Support\Facades\Log;
use RuntimeException;
use Symfony\Component\Process\ExecutableFinder;

class BubblewrapSandboxRunner implements SandboxRunner
{
    private ?string $bwrapPath;

    public function __construct(ExecutableFinder $executableFinder)
    {
        $this->bwrapPath = self::getBwrapPath($executableFinder);
    }

    public function getCommand(string $safePath, string $originalCommand): string
    {
        if ($this->bwrapPath === null) {
            Log::warning('Bubblewrap not available, running original unsafe command', [
                'safePath' => $safePath,
                'originalCommand' => $originalCommand,
            ]);
            return $originalCommand;
        }
        $cmdParts = [
            $this->bwrapPath,
            '--unshare-all',
            '--clearenv',
            '--setenv', 'PATH', '"$PATH"',
            '--setenv', 'TEXMFROOT', '"$TEXMFROOT"',
            '--setenv', 'TEXMFDIST', '"$TEXMFDIST"',
            '--setenv', 'TEXMFCNF', '"$TEXMFCNF"',
            '--setenv', 'TEXMFVAR', '"$TEXMFVAR"',
            '--setenv', 'TEXMFCONFIG', '"$TEXMFCONFIG"',
            '--tmpfs', '/tmp',
            '--bind', $safePath, $safePath,
            '--ro-bind', '/usr/bin', '/usr/bin',
            '--ro-bind', '/bin', '/bin',
            '--ro-bind', '/usr/lib', '/usr/lib',
            '--ro-bind', '/usr/lib64', '/usr/lib64',
            '--ro-bind', '/lib', '/lib',
            '--ro-bind', '/lib64', '/lib64',
            '--ro-bind', '/usr/share/perl5', '/usr/share/perl5',
            '--ro-bind', '/usr/share/texlive', '/usr/share/texlive',
            '--ro-bind', '/usr/share/texmf', '/usr/share/texmf',
            '--ro-bind', '/var/lib/texmf', '/var/lib/texmf',
            '--ro-bind', '/etc/latexmk.conf', '/etc/latexmk.conf',
            '--ro-bind', '/etc/papersize', '/etc/papersize',
            '--ro-bind', '/etc/texlive', '/etc/texlive',
            '--ro-bind', '/etc/fonts', '/etc/fonts',
            '--dev-bind', '/dev/null', '/dev/null',
            //'--proc', '/proc',
            '--chdir', $safePath,
            '--unshare-net',
            $originalCommand,
        ];
        return implode(' ', $cmdParts);
    }

    private static function getBwrapPath(ExecutableFinder $executableFinder): ?string
    {
        $path = $executableFinder->find('bwrap');
        if ($path !== null || !app()->environment('production')) {
            return $path;
        }
        throw new RuntimeException('Cannot find bwrap path');
    }
}
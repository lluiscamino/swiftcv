<?php

namespace App\Sandboxing;

interface SandboxRunner
{
    function getCommand(string $safePath, string $originalCommand): string;
}
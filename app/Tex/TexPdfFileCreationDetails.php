<?php

namespace App\Tex;

readonly class TexPdfFileCreationDetails
{
    private function __construct(
        private string $command,
        private bool   $success,
        private int    $exitCode,
        private string $output,
        private string $errorOutput,
    )
    {
    }

    public function toMarkdown(): string
    {
        return "# Command
```
$this->command
```
Exit code: $this->exitCode

# Error output
```
$this->errorOutput
```

# All output
```
$this->output
```
        ";
    }

    public static function fromProcessResult(mixed $processResult): self
    {
        return new self(
            command: $processResult->command(),
            success: $processResult->successful(),
            exitCode: $processResult->exitCode(),
            output: $processResult->output(),
            errorOutput: $processResult->errorOutput()
        );
    }
}
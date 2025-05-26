<?php

namespace App\Files;

use LogicException;

readonly class CreatedFile
{
    protected function __construct(private ?string $path)
    {
    }

    public function path(): string
    {
        if ($this->failed()) {
            throw new LogicException("Attempted to get path of failed file.");
        }
        return $this->path;
    }

    public function successful(): bool
    {
        return !$this->failed();
    }

    public function failed(): bool
    {
        return $this->path === null;
    }

    public static function fromPath(string $path): self
    {
        return new self($path);
    }

    public static function failedFile(): self
    {
        return new self(null);
    }
}
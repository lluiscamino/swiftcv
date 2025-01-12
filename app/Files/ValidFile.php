<?php

namespace App\Files;

use InvalidArgumentException;
use RuntimeException;

readonly class ValidFile
{
    private function __construct(public string $path)
    {
    }

    public function baseName(): string
    {
        return basename($this->path);
    }

    public function content(): string
    {
        $content = file_get_contents($this->path);
        if ($content === false) {
            throw new RuntimeException("File '$this->path' not found when trying to read content");
        }
        return $content;
    }

    public static function fromPath(string $path): self
    {
        if (!file_exists($path)) {
            throw new InvalidArgumentException("File $path does not exist");
        }
        return new self($path);
    }

    public static function fromAppPath(string $path): self
    {
        return self::fromPath(app_path($path));
    }

    /**
     * @param CreatedFile[] $createdFiles
     * @return self[]
     */
    public static function fromCreatedFiles(array $createdFiles): array
    {
        return array_map(
            fn(CreatedFile $createdFile) => self::fromCreatedFile($createdFile),
            array_filter($createdFiles, fn(CreatedFile $createdFile) => $createdFile->successful())
        );
    }

    private static function fromCreatedFile(CreatedFile $createdFile): ValidFile
    {
        return new ValidFile($createdFile->path());
    }
}
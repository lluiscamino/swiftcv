<?php

namespace App\Livewire\Forms;

use App\ResumeTemplates\Variables\DateRange;
use DateTime;
use Exception;
use RuntimeException;

trait GetPropertyValues
{
    private function getDateRangePropertyValue(string $prefix): DateRange
    {
        return new DateRange(
            startDate: $this->getDatePropertyValue("$prefix.startDate"),
            endDate: $this->getDatePropertyValue("$prefix.endDate")
        );
    }

    private function getDatePropertyValue(string $name): DateTime|null
    {
        return self::toDateTime($this->getPropertyValue($name));
    }

    private static function toDateTime(?string $value): DateTime|null
    {
        try {
            return $value ? new DateTime($value) : null;
        } catch (Exception $e) {
            throw new RuntimeException("Invalid date '$value'", [
                'exception' => $e
            ]);
        }
    }

    /** @return string[] */
    private function getDescriptionValue(string $name): array
    {
        return array_filter(
            array_map(
                fn(string $line) => trim($line),
                explode("\n", $this->getPropertyValue($name))
            ),
            fn(string $line) => strlen($line) > 0
        );
    }
}
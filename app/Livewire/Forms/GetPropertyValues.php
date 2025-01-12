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
}
<?php

namespace App\Livewire\Forms;

use DateTime;
use Exception;
use RuntimeException;

trait GetPropertyValues
{
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
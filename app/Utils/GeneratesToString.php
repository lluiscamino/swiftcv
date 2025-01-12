<?php

namespace App\Utils;

use ReflectionClass;
use ReflectionProperty;
use Throwable;

trait GeneratesToString
{
    private const UNKNOWN_VALUE = '?';

    public function __toString(): string
    {
        return self::valueToString($this);
    }

    private static function valueToString(mixed $value): string
    {
        try {
            if (is_null($value)) {
                return 'null';
            }
            if (is_scalar($value)) {
                return (string)$value;
            }
            if (is_object($value)) {
                return self::objectToString($value);
            }
            return self::UNKNOWN_VALUE;
        } catch (Throwable) {
            return self::UNKNOWN_VALUE;
        }
    }

    private static function objectToString(object $value): string
    {
        $reflect = new ReflectionClass($value);
        if ($reflect->isEnum()) {
            return $value->name;
        }
        $properties = $reflect->getProperties();
        $propertiesToString = array_map(
            fn(ReflectionProperty $prop) => self::propertyToString($value, $prop),
            $properties
        );
        return $reflect->getShortName() . '(' . join(', ', $propertiesToString) . ')';
    }

    private static function propertyToString(mixed $object, ReflectionProperty $property): string
    {
        return $property->getName() . ': ' . self::valueToString($property->getValue($object));
    }
}
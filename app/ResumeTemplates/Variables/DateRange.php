<?php

namespace App\ResumeTemplates\Variables;

use DateTime;

readonly class DateRange
{
    private const DATE_FORMAT = 'M Y';

    public function __construct(
        public DateTime  $startDate,
        public ?DateTime $endDate,
    )
    {
    }

    public function __toString(): string
    {
        return $this->startDate->format(self::DATE_FORMAT) . ' - ' . $this->formatEndDate();
    }

    private function formatEndDate(): string
    {
        return $this->endDate?->format(self::DATE_FORMAT) ?? 'Present';
    }
}
<?php

declare(strict_types=1);

namespace src\domains\calculate_days\value_objects;

final class DateOfBirth
{
    private string $dateOfBirth;

    public function __construct(string $dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    public function get(): string
    {
        return $this->dateOfBirth;
    }
}

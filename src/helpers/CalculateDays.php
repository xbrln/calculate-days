<?php

declare(strict_types=1);

namespace src\helpers;

use Carbon\Carbon;
use src\domains\calculate_days\value_objects\DateOfBirth;

final class CalculateDays
{
    public static function numberOfDaysTillToday(DateOfBirth $dob): int
    {
        [$day, $month, $year] = explode('-', $dob->get());
        return Carbon::today()->diffInDays(Carbon::createMidnightDate((int)$year, (int)$month, (int)$day));
    }
}

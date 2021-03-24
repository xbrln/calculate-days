<?php

declare(strict_types=1);

use src\helpers\Validate;
use src\helpers\CalculateDays;
use src\domains\calculate_days\value_objects\DateOfBirth;
use Symfony\Component\HttpFoundation\Request;

class CalculateDaysController
{
    public function index(): int
    {
        return view('index', $this->calculate());
    }

    public function calculate(): array
    {
        $request = Request::createFromGlobals();

        if ($request->getMethod() != 'POST') {
            return [];
        }
        $dob = $request->get('date_of_birth');
        if (!Validate::dateOfBirth($dob)) {
            return ['error' => 'Please enter date in <b>dd-mm-yyyy</b> format'];
        }
        return [
            'daysOnEarth' => CalculateDays::numberOfDaysTillToday(new DateOfBirth($dob)),
            'dateOfBirth' => $dob
        ];
    }
}

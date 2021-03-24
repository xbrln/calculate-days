<?php

declare(strict_types=1);

namespace src\helpers;

final class Validate
{
    public static function dateOfBirth(string $input) : bool
    {
        $validationStatus = true;
        $matches = array();
        $pattern = '/^([0-9]{1,2})\\-([0-9]{1,2})\\-([0-9]{4})$/';
        if (!preg_match($pattern, $input, $matches)) {
            $validationStatus = false;
        }
        if (!checkdate((int)$matches[2], (int)$matches[1], (int)$matches[3])) {
            $validationStatus = false;
        }
        return $validationStatus;
    }
}

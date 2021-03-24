<?php

declare(strict_types=1);

namespace test\unit;

use src\helpers\Validate;
use PHPUnit\Framework\TestCase;

final class ValidateTest extends TestCase
{
    public function testCanValidateDobInRightFormat(): void
    {
        $dob = '01-02-1972';
        $this->assertTrue(Validate::dateOfBirth($dob));
    }
}

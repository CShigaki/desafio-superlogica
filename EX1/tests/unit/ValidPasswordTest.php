<?php

declare(strict_types=1);

namespace Superlogica\Validations;

use PHPUnit\Framework\TestCase;

class ValidPasswordTest extends TestCase
{
    /**
     * @dataProvider passwordProvider
     */
    public function testIfPasswordIsValidatedCorrectly(string $password, bool $isValid): void
    {
        $this->assertEquals($isValid, ValidPassword::validate($password));
    }

    public function passwordProvider(): array
    {
        return [
            ['abcd12345', true],
            ['abcdefghi', false],
            ['123456789', false],
            ['asd', false],
            ['123', false],
            ['asd123', false],
        ];
    }
}

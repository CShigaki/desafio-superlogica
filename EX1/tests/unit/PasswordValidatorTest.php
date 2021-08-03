<?php

declare(strict_types=1);

namespace Superlogica\Validations;

use PHPUnit\Framework\TestCase;

class PasswordValidatorTest extends TestCase
{
    /**
     * @var PasswordValidator
     */
    private $passwordValidator;

    public function setUp(): void
    {
        $this->passwordValidator = new PasswordValidator();
    }

    /**
     * @dataProvider passwordProvider
     */
    public function testIfPasswordIsValidatedCorrectly(string $password, bool $isValid): void
    {
        $this->assertEquals($isValid, $this->passwordValidator->validate($password));
    }

    public function passwordProvider(): array
    {
        return [
            ['abcd12345', true],
            ['abcdefghi', false],
            ['123456789', false],
            ['1234abcd', true],
            ['asd', false],
            ['123', false],
            ['asd123', false],
        ];
    }
}

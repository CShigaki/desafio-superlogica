<?php

declare(strict_types=1);

namespace Superlogica\Validations;

use PHPUnit\Framework\TestCase;

class EmailValidatorTest extends TestCase
{
    /**
     * @var EmailValidator
     */
    private $emailValidator;

    public function setUp(): void
    {
        $this->emailValidator = new EmailValidator();
    }

    /**
     * @dataProvider emailProvider
     */
    public function testIfEmailIsValidatedCorrectly(string $email, bool $isValid): void
    {
        $this->assertEquals($isValid, $this->emailValidator->validate($email));
    }

    public function emailProvider(): array
    {
        return [
            ['celso.shigaki@gmail.com', true],
            ['celso.', false],
            ['celso.shigaki@@gmail.com', false],
            ['celso.shigaki@gmail', false],
            ['mada@celso.shigaki@gmail.com', false],
            ['🐓@gmail.com', false],
            ['', false],
        ];
    }
}

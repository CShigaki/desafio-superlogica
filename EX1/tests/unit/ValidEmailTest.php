<?php

declare(strict_types=1);

namespace Superlogica\Validations;

use PHPUnit\Framework\TestCase;

class ValidEmailTest extends TestCase
{
    /**
     * @dataProvider emailProvider
     */
    public function testIfEmailIsValidatedCorrectly(string $email, bool $isValid): void
    {
        $this->assertEquals($isValid, ValidEmail::validate($email));
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

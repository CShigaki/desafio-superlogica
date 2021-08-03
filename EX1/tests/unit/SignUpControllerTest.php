<?php

declare(strict_types=1);

namespace Superlogica\Validations;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Superlogica\SignUpController;

class SignUpControllerTest extends TestCase
{
    public function testValidationsAndExpectedErrors()
    {
        $zipValidatorMock = $this->createMock(ZipValidator::class);
        $zipValidatorMock->method('validate')
            ->willReturn(false);

        $signUpController = new SignUpController();
        $signUpZipValidatorProperty = (new ReflectionClass($signUpController))->getProperty('zipValidator');

        $signUpZipValidatorProperty->setAccessible(true);
        $signUpZipValidatorProperty->setValue($signUpController, $zipValidatorMock);

        $payload = [
            'name' => '',
            'login' => '',
            'zip_code' => '1234',
            'email' => 'celso.',
            'password' => '123ab',
        ];
        $expectedErrors = [
            'name' => 'Campo requerido',
            'login' => 'Campo requerido',
            'zip_code' => 'CEP Inválido',
            'email' => 'Email inválido',
            'password' => 'A senha deve ter pelo menos 8 caracteres e pelo menos 1 letra e um número',
        ];

        $this->assertEquals($expectedErrors, $signUpController->validateSignUpValues($payload));
    }
}

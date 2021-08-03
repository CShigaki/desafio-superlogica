<?php

declare(strict_types = 1);

namespace Superlogica;

use Superlogica\Validations\EmailValidator;
use Superlogica\Validations\PasswordValidator;
use Superlogica\Validations\ZipValidator;

/**
 * Class SignUpValidator
 */
class SignUpController
{
    /**
     * @var ZipValidator
     */
    private $zipValidator;

    /**
     * @var PasswordValidator
     */
    private $passwordValidator;

    /**
     * @var EmailValidator
     */
    private $emailValidator;

    /**
     * SignUpValidator constructor.
     */
    public function __construct()
    {
        // Make this the validation method possible to test
        $this->zipValidator = new ZipValidator();
        $this->passwordValidator = new PasswordValidator();
        $this->emailValidator = new EmailValidator();
    }

    /**
     * @param array $formValues
     */
    public function signUp(array $formValues): array
    {
        $errors = $this->validateSignUpValues($formValues);

        if (Helpers::select('cadastro', $formValues)) {
            $errors['general'] = 'Email ou login duplicados';
        }

        if (0 === count($errors)) {
            return [
                'id' => Helpers::insert('cadastro', $formValues),
            ];
        }

        return $errors;
    }

    /**
     * @param array<string, string> $formValues
     */
    public function validateSignUpValues(array $formValues): array
    {
        $errors = [];
        foreach ($formValues as $fieldName => $fieldValue) {
            if (empty($fieldValue)) {
                // This scenario shouldn't happen normally because the required tag will make
                // sure the field is not empty but regardless, validation is the back-end should always be done
                $errors[$fieldName] = 'Campo requerido';
            }
        }

        if (!$this->zipValidator->validate($formValues['zip_code'])) {
            $errors['zip_code'] = 'CEP Inválido';
        }

        if (!$this->passwordValidator->validate($formValues['password'])) {
            $errors['password'] = 'A senha deve ter pelo menos 8 caracteres e pelo menos 1 letra e um número';
        }

        if (!$this->emailValidator->validate($formValues['email'])) {
            // Same for this field.
            $errors['email'] = 'Email inválido';
        }

        return $errors;
    }
}

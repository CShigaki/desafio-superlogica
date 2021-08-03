<?php

declare(strict_types = 1);

include_once('validations/ValidEmail.php');
include_once('validations/ValidPassword.php');
include_once('validations/ValidZip.php');

/**
 * Class SignUpValidator
 *
 * Following the example of the Helpers class I created different classes for each validation type
 * and created static functions on each one.
 */
class SignUpValidator
{
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

        if (!ValidZip::validate($formValues['zip_code'])) {
            $errors['zip_code'] = 'CEP Inválido';
        }

        if (!ValidPassword::validate($formValues['password'])) {
            $errors['password'] = 'A senha deve ter pelo menos 8 caracteres e pelo menos 1 letra e um número';
        }

        if (!ValidEmail::validate($formValues['email'])) {
            // Same for this field.
            $errors['email'] = 'Email inválido';
        }

        if (Helpers::select('cadastro', $formValues)) {
            $errors['general'] = 'Email ou login já cadastrados';
        }

        return $errors;
    }
}

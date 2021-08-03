<?php

declare(strict_types=1);

namespace Superlogica\Validations;

class EmailValidator implements ValidatorInterface
{
    /**
     * @param string $dataToValidate
     *
     * @return bool
     */
    public function validate(string $dataToValidate): bool
    {
        return !($dataToValidate === '') &&
            $dataToValidate === filter_var($dataToValidate, FILTER_VALIDATE_EMAIL);
    }
}

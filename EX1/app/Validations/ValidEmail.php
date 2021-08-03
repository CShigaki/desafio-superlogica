<?php

declare(strict_types=1);

namespace Superlogica\Validations;

class ValidEmail implements ValidationInterface
{
    /**
     * @param string $dataToValidate
     *
     * @return bool
     */
    public static function validate(string $dataToValidate): bool
    {
        return !($dataToValidate === '') &&
            $dataToValidate === filter_var($dataToValidate, FILTER_VALIDATE_EMAIL);
    }
}

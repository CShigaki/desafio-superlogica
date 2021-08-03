<?php

declare(strict_types=1);

include_once('ValidationInterface.php');

class ValidEmail implements ValidationInterface
{
    /**
     * @param string $dataToValidate
     *
     * @return bool
     */
    public static function validate(string $dataToValidate): bool
    {
        return $dataToValidate === filter_var($dataToValidate, FILTER_VALIDATE_EMAIL);
    }
}

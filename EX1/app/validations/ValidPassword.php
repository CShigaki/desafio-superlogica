<?php

declare(strict_types=1);

include_once('ValidationInterface.php');

class ValidPassword implements ValidationInterface
{
    /**
     * @param string $dataToValidate
     *
     * @return bool
     */
    public static function validate(string $dataToValidate): bool
    {
        // Minimum 8 characters, at least 1 letter and 1 number
        $hasNumbers = 1 === preg_match('/\d/', $dataToValidate);
        $hasLetters = 1 === preg_match('/[a-zA-Z]/', $dataToValidate);

        return strlen($dataToValidate) > 8 && $hasNumbers && $hasLetters;
    }
}

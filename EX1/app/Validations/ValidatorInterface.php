<?php

declare(strict_types=1);

namespace Superlogica\Validations;

interface ValidatorInterface
{
    /**
     * @param string $dataToValidate
     *
     * @return bool
     */
    public static function validate(string $dataToValidate): bool;
}

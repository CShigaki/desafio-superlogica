<?php

declare(strict_types=1);

include_once('ValidationInterface.php');

class ValidZip implements ValidationInterface
{
    /**
     * @param string $dataToValidate
     *
     * @return bool
     */
    public static function validate(string $dataToValidate): bool
    {
        // I would normally get a Guzzle client through dependency injection instead of using curl
        // but I ended up using because this is not using zend.
        $channel = curl_init("https://viacep.com.br/ws/{$dataToValidate}/json/");
        curl_setopt($channel, CURLOPT_RETURNTRANSFER, 1);
        curl_exec($channel);
        $responseInfo = curl_getinfo($channel);
        curl_close($channel);

        return 200 === $responseInfo['http_code'];
    }
}

<?php

declare(strict_types=1);

namespace Superlogica\Validations;

/**
 * Since I'm not using dependency injection and I'm not sure how to mock curl, this class will not be tested.
 *
 * Class ValidZip
 */
class ZipValidator implements ValidatorInterface
{
    /**
     * @param string $dataToValidate
     *
     * @return bool
     */
    public function validate(string $dataToValidate): bool
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

<?php

namespace UrlShortener\Validation;

use UrlShortener\Exceptions\InvalidUrlStatusException;

class UrlValidation
{
    const REQUIRED_STATUS = [200, 201, 301, 302];

    public static function validate(string $url): void
    {
        if (!filter_var($url, FILTER_VALIDATE_URL))
            throw new \InvalidArgumentException('STRING "' . $url . '" IS NOT URL');

        $code = self::getRequestCode($url);
        $isAccess = in_array($code, self::REQUIRED_STATUS);

        if (!$isAccess)
            throw new InvalidUrlStatusException("RETURNED STATUS IS $code BUT SHOULD BE " . implode(", ", self::REQUIRED_STATUS));

    }

    /**
     * @param string $url
     * @return int
     */
    private static function getRequestCode(string $url): int
    {
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_NOBODY, true);
        curl_exec($curl);
        curl_close($curl);

        return curl_getinfo($curl, CURLINFO_HTTP_CODE);
    }
}
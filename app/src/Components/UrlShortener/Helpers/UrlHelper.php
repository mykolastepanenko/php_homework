<?php

namespace Components\UrlShortener\Helpers;

use GuzzleHttp\Client;
use UrlShortener\Helpers\InvalidArgumentException;

class UrlHelper
{
    /**
     * @param string $url
     * @param array $data
     * @return bool
     */
    public static function isUrlExists(string $url, array $data): bool
    {
        $values = array_values($data);
        return in_array($url, $values);
    }

    /**
     * @param string $url
     * @return void
     * @throws InvalidArgumentException
     */
    public static function validate(string $url): void
    {
        if (!filter_var($url, FILTER_VALIDATE_URL))
            throw new \InvalidArgumentException('STRING "' . $url . '" IS NOT URL');

        $code = self::getRequestCodeGuzzle($url);
        $accessAbleCodeStatus = array_map('intval', explode(",", $_ENV["ACCESS_ABLE_URL_STATUS"]));
        $isAccess = in_array($code, $accessAbleCodeStatus);

        if (!$isAccess)
            throw new \InvalidArgumentException("RETURNED STATUS IS $code BUT SHOULD BE " . implode(", ", $accessAbleCodeStatus));
    }

    /**
     * @param string $url
     * @return int
     */
    protected static function getRequestCode(string $url): int
    {
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_NOBODY, true);
        curl_exec($curl);
        curl_close($curl);

        return curl_getinfo($curl, CURLINFO_HTTP_CODE);
    }

    /**
     * @param string $url
     * @return int
     */
    protected static function getRequestCodeGuzzle(string $url): int
    {
        $client = new Client();

        $response = $client->get($url);

        return $response->getStatusCode();
    }

    /**
     * @param string $code
     * @param int $length
     * @return void
     * @throws \InvalidArgumentException
     */
    public static function validateLength(string $code, int $length): void
    {
        if (strlen($code) > $length)
            throw new \InvalidArgumentException("URL \"$code\" HAS " . strlen($code) . " SYMBOLS, BUT MUST BE LESS THEN $length SYMBOLS");
    }
}
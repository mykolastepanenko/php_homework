<?php

namespace Mykola\HW3\UrlShortener\Validation;

class UrlLengthValidation
{
    /**
     * @param string $url
     * @param int $length
     * @return void
     * @throws \Exception
     */
    public static function validate(string $url, int $length): void
    {
        if (strlen($url) > $length)
            throw new \Exception("URL \"$url\" HAS " . strlen($url) . " SYMBOLS, BUT MUST BE LESS THEN $length SYMBOLS");
    }
}
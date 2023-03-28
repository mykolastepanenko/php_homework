<?php

namespace UrlShortener\UrlEncoder;

use Mykola\HW3\UrlShortener\Validation\UrlLengthValidation;
use UrlShortener\File\File;
use UrlShortener\UrlEncoder\IUrlEncoder;
use UrlShortener\Validation\UrlValidation;

class UrlEncoder implements IUrlEncoder
{
    public function encode(string $url): string
    {
        UrlValidation::validate($url);
        $code = hash('xxh32', $url);
        UrlLengthValidation::validate($code, 10);

        $file = new File();
        $file->write("links.json", $url, $code);

        return $code;
    }
}
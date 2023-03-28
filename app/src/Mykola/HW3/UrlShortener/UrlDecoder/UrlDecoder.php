<?php

namespace UrlShortener\UrlDecoder;

use Mykola\HW3\UrlShortener\Validation\UrlLengthValidation;
use UrlShortener\Exceptions\InvalidCodeException;
use UrlShortener\File\File;
use UrlShortener\UrlDecoder\IUrlDecoder;

class UrlDecoder implements IUrlDecoder
{

    public function decode(string $code): string
    {
        UrlLengthValidation::validate($code, 10);

        $file = new File();
        $links = $file->read('links.json');
        $link = $this->getLink($code, $links);
        return $link;
    }

    protected function getLink($code, $links)
    {
        $keys = array_keys($links);
        $index = array_search($code, $keys);

        if(!is_numeric($index)) throw new InvalidCodeException("CODE \"$code\" IS NOT EXISTS");

        $arr = array_values($links);
        return $arr[$index];
    }
}
<?php

namespace Mykola\HW3;

use Mykola\Interfaces\IApplication;
use UrlShortener\UrlDecoder\UrlDecoder;
use UrlShortener\UrlEncoder\UrlEncoder;

class Application implements IApplication
{
    public function start(): void
    {
        try {
            $url = 'https://jsonplaceholder.typicode.com/todos/1';
//            $url = 'https://google.com';

            $urlEncoder = new UrlEncoder();
            $code = $urlEncoder->encode($url);
            echo "URL \"$url\" shorted to \"$code\"", PHP_EOL;

            $urlDecoder = new UrlDecoder();
            $code = '18afc886';
//            $code = '';
            echo "Your URL \"" . $urlDecoder->decode($code) . "\" by short code \"$code\"";
        } catch (\InvalidArgumentException $exception) {
            echo "InvalidArgumentException: " . $exception->getMessage(), PHP_EOL;
        }
    }
}
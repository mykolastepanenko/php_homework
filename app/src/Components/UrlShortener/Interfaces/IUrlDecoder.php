<?php

namespace Components\UrlShortener\Interfaces;

interface IUrlDecoder
{
    /**
     * @param string $code
     * @return string
     * @throws \InvalidArgumentException
     */
    public function decode(string $code): string;
}
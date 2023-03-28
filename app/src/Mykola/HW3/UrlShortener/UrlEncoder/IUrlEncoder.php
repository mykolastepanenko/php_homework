<?php

namespace UrlShortener\UrlEncoder;

interface IUrlEncoder
{

    /**
     * @param string $url
     * @return string
     * @throws \InvalidArgumentException
     */
    public function encode(string $url): string;
}
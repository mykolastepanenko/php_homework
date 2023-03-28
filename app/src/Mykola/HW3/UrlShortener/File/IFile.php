<?php

namespace UrlShortener\File;

interface IFile
{
    public function read(string $file): array|null;

    public function write(string $file, string $url, string $shortUrl): void;
}
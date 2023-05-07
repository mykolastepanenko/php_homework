<?php

namespace Repositories\Interfaces;

interface IRepository
{
    /**
     * @return array
     * @throws \InvalidArgumentException
     */
    public function read(): array;

    /**
     * @param string $url
     * @param string $code
     * @return void
     */
    public function write(string $url, string $code): void;
}
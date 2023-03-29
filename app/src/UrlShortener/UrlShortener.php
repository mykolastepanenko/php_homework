<?php

namespace UrlShortener;

use UrlShortener\Helpers\UrlHelper;
use UrlShortener\Interfaces\IRepository;
use UrlShortener\Interfaces\IUrlDecoder;
use UrlShortener\Interfaces\IUrlEncoder;

class UrlShortener implements IUrlEncoder, IUrlDecoder
{
    /**
     * @param IRepository $repository
     */
    public function __construct(protected IRepository $repository)
    {
    }

    /**
     * @param string $url
     * @return string
     * @throws \InvalidArgumentException
     */
    public function encode(string $url): string
    {
        UrlHelper::validate($url);
        $code = hash('xxh32', $url);
        $this->repository->write($url, $code);
        return $code;
    }

    /**
     * @param string $code
     * @return string
     * @throws \InvalidArgumentException
     */
    public function decode(string $code): string
    {
        UrlHelper::validateLength($code, $_ENV['MAX_CODE_LENGTH']);
        $links = $this->repository->read();
        $keys = array_keys($links);
        $index = array_search($code, $keys);

        if (!is_numeric($index)) throw new \InvalidArgumentException("CODE \"$code\" IS NOT EXISTS");

        $arr = array_values($links);
        return $arr[$index];
    }
}
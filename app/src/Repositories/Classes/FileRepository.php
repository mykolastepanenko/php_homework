<?php

namespace Repositories\Classes;

use Components\UrlShortener\Exceptions\FileNotExistsException;
use Components\UrlShortener\Helpers\UrlHelper;
use Repositories\Interfaces\IRepository;

class FileRepository implements IRepository
{
    /**
     * @param string $filePath
     */
    public function __construct(protected string $filePath)
    {
    }

    /**
     * @return array
     * @throws FileNotExistsException
     */
    public function read(): array
    {
        if (!file_exists($this->filePath))
            throw new FileNotExistsException("FILE \"$this->filePath\" IS NOT EXISTS");

        $jsonString = file_get_contents($this->filePath);
        if (!$jsonString)
            return [];

        return json_decode($jsonString, true);
    }

    /**
     * @param string $url
     * @param string $code
     * @return void
     */
    public function write(string $url, string $code): void
    {
        try {
            $data = $this->read();
        } catch (FileNotExistsException) {
            $data = [];
        }
        if (!UrlHelper::isUrlExists($url, $data)) {
            $data[$code] = $url;
            $jsonString = json_encode($data);
            file_put_contents($this->filePath, $jsonString);
        }
    }
}
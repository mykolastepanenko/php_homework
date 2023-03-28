<?php

namespace UrlShortener\File;

use UrlShortener\Exceptions\EmptyFileException;
use UrlShortener\Exceptions\FileNotExistsException;
use UrlShortener\Exceptions\UrlExistsException;

class File implements IFile
{
    public function read(string $file): array|null
    {
        if (!file_exists($file))
            throw new FileNotExistsException("FILE \"$file\" IS NOT EXISTS");
        $jsonString = file_get_contents($file);
        if (!$jsonString)
            throw new EmptyFileException("FILE \"$file\" IS EMPTY");
        return json_decode($jsonString, true);
    }

    public function write(string $file, string $url, string $shortUrl): void
    {
        try {
            $this->appendNewUrl($file, $url, $shortUrl);
        } catch (FileNotExistsException) {
            $this->writeNewUrl($file, $url, $shortUrl);
        } catch (EmptyFileException) {
            $this->writeNewUrl($file, $url, $shortUrl);
        } catch (UrlExistsException) {
            return;
        }
    }

    protected function appendNewUrl($file, $url, $shortUrl)
    {
        $fileData = $this->read($file);
        $this->isUrlExists($fileData, $url);
        $this->addNewUrl($fileData, $shortUrl, $url, $file);
    }

    protected function writeNewUrl($file, $url, $shortUrl)
    {
        $fileData = [];
        $this->addNewUrl($fileData, $shortUrl, $url, $file);
    }

    protected function isUrlExists($fileData, $url)
    {
        $values = array_values($fileData);
        if (in_array($url, $values)) {
            throw new UrlExistsException("KEY $url ALREADY EXISTS");
        }
    }

    protected function addNewUrl($fileData, $shortUrl, $url, $file)
    {
        $fileData[$shortUrl] = $url;
        $jsonString = json_encode($fileData);
        file_put_contents($file, $jsonString);
    }
}
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use UrlShortener\UrlShortener;
use UrlShortener\Repositories\FileRepository;

$url = 'https://jsonplaceholder.typicode.com/todos/1';
//            $url = 'https://google.com';
$code = '123';
$filePath = $_ENV['FILE_STORAGE_PATH'] . $_ENV["FILE_STORAGE_NAME"];
$fileRepository = new FileRepository($filePath);

$shortener = new UrlShortener($fileRepository);
$code = $shortener->encode($url);
$shortener->decode($code);

echo PHP_EOL;
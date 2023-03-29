<?php

require_once __DIR__ . '/../vendor/autoload.php';

use UrlShortener\UrlShortener;
use UrlShortener\Repositories\FileRepository;
use Monolog\Logger;
use Monolog\Level;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

$url = 'https://jsonplaceholder.typicode.com/todos/1';
//            $url = 'https://google.com';
$code = '123';

$filePath = $_ENV['FILE_STORAGE_PATH'] . $_ENV["FILE_STORAGE_NAME"];
$fileRepository = new FileRepository($filePath);

$logger = new Logger('logger');
$logger->pushHandler(new StreamHandler($_ENV['LOGS_PATH'] . 'info.log', Level::Info));
$logger->pushHandler(new StreamHandler($_ENV['LOGS_PATH'] . 'error.log', Level::Error));
$logger->pushHandler(new FirePHPHandler());

try {
    $shortener = new UrlShortener($fileRepository, $logger);
    $code = $shortener->encode($url);
    $shortener->decode($code);
} catch (\InvalidArgumentException $exception) {
    $logger->error($exception->getMessage());
}

echo PHP_EOL;
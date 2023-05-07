<?php

use Components\Database\Eloquent\ActiveRecordInitializer;
use Components\DIC\Classes\Two;
use Components\DIC\Enums\ServiceKeys as KEYS;
use Components\UrlShortener\UrlShortener;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Monolog\Level;
use Monolog\Logger;
use Repositories\Classes\ARCodeRepository;
use Repositories\Classes\FileRepository;
use Components\Initializers\MonologInitializer;

return [
    'one' => 123,
    'two' => 222,
    'five' => 555,
    'twoClass' => [
        KEYS::CLASSNAME => Two::class
    ],
    'logger' => 'logger',
    'database.eloquent' => [
        KEYS::CLASSNAME => ActiveRecordInitializer::class
    ],
    'database.eloquent.codeRepository' => [
        KEYS::CLASSNAME => ARCodeRepository::class
    ],
    'monolog' => [
        KEYS::CLASSNAME => Logger::class,
        KEYS::ARGUMENTS => ['logger']
    ],
    'monolog.level.info' => Level::Info,
    'monolog.level.error' => Level::Error,
    'monolog.path.info' => $_ENV['LOGS_PATH'] . 'info.log',
    'monolog.path.error' => $_ENV['LOGS_PATH'] . 'error.log',
    'monolog.handlers.info' => [
        KEYS::CLASSNAME => StreamHandler::class,
        KEYS::ARGUMENTS => ['monolog.path.info', 'monolog.level.info']
    ],
    'monolog.handlers.error' => [
        KEYS::CLASSNAME => StreamHandler::class,
        KEYS::ARGUMENTS => ['monolog.path.error', 'monolog.level.error']
    ],
    'monolog.handlers.fire' => [
        KEYS::CLASSNAME => FirePHPHandler::class,
    ],
    'monolog.initializer' => [
        KEYS::CLASSNAME => MonologInitializer::class,
        KEYS::ARGUMENTS => [
            'monolog',
            'monolog.handlers.info',
            'monolog.handlers.error',
            'monolog.handlers.fire',
        ]
    ],
    'shortener.url' => 'https://jsonplaceholder.typicode.com/todos/1',
//    'shortener.url' => 'https://google.com',
    'shortener.code' => '18afc886',
//    'shortener.code' => '75cfd436',
    'shortener' => [
        KEYS::CLASSNAME => UrlShortener::class,
//        KEYS::ARGUMENTS => ['database.file.fileRepository', 'monolog']
        KEYS::ARGUMENTS => ['database.eloquent.codeRepository', 'monolog']
    ],
    'database.file.filePath' => $_ENV['FILE_STORAGE_PATH'] . $_ENV["FILE_STORAGE_NAME"],
    'database.file.fileRepository' => [
        KEYS::CLASSNAME => FileRepository::class,
        KEYS::ARGUMENTS => ['database.file.filePath']
    ]
];
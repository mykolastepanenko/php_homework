<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Components\DIC\Classes\Container;
use Components\Initializers\MonologInitializer;
use Components\UrlShortener\UrlShortener;
use Migrations\Classes\CodeMigration;
use Migrations\Classes\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

$config = require __DIR__ . '/../src/Components/DIC/config.php';
$container = new Container($config);

$url = $container->get('shortener.url');
$code = $container->get('shortener.code');

/**
 * @var UrlShortener $shortener
 */
$shortener = $container->get('shortener');
$logger = $container->get('monolog');
$database = $container->get('database.eloquent');

/**
 * @var MonologInitializer $loggerIniter
 */
$loggerInitializer = $container->get('monolog.initializer');
$loggerInitializer->init();

/**
 * @var Capsule $capsule
 */
$capsule = $container->services['database.eloquent.capsule'] = $database->init();
$schema = $container->services['database.eloquent.schema'] = Capsule::schema();

//$schema->dropIfExists('codes');
if (!$schema->hasTable('codes')) {
    $migration = new Migration([new CodeMigration]);
    $migration->migrate();
}

try {
    $code = $shortener->encode($url);
    $shortener->decode($code);
} catch (\InvalidArgumentException $exception) {
    $logger->error($exception->getMessage());
}

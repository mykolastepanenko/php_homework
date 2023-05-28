<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Components\DIC\Classes\Container;
use Components\UrlShortener\UrlShortener;

$config = require __DIR__ . '/../src/Components/DIC/web_config.php';
$container = new Container($config);

/**
 * @var UrlShortener $shortener
 */
$shortener = $container->get('shortener');

try {
    $url = $_GET['url'];
    dump($shortener->encode($url));
} catch (Exception|Error $e) {
    dd($e);
}
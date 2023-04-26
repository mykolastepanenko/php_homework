<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Classes\User;
use App\Classes\UserRepository;
use Container\Container;
use App\Interfaces\IUser;

$config = require __DIR__ . '/../src/DIC/DIC/config.php';
$container = new Container($config);

$repo = $container->get('userRepository');
$user = $container->get('user');

$repo->save();

dump($repo);
dump($user);

//dd($repo);

dd($container->services);
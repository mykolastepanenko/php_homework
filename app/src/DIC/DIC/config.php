<?php

use AppDIC\DIC\Enums\ServiceKeys as KEYS;

return [
    'threeClass' => [
        KEYS::CLASSNAME => \AppDIC\Classes\Three::class,
        KEYS::ARGUMENTS => ['five', 'user'],
    ],
    'one' => 123,
    'two' => 222,
    'five' => 555,
    'userRepository' => [
        KEYS::CLASSNAME => \AppDIC\Classes\UserRepository::class,
        KEYS::ARGUMENTS => ['user']
    ],
    'user' => [
        KEYS::CLASSNAME => \AppDIC\Classes\User::class,
//        KEYS::CLASSNAME => \AppDIC\Classes\SecondUser::class,
        KEYS::ARGUMENTS => ['five']
    ],
    'twoClass' => [
        KEYS::CLASSNAME => \AppDIC\Classes\Two::class
    ],
];
<?php

namespace AppDIC\Classes;

use AppDIC\Interfaces\IUser;

class User implements IUser
{
    public function __construct(protected mixed $arg1)
    {
    }

    public function getName(): string
    {
        return 'user name';
    }

    public function getRole(): string
    {
        return 'user';
    }
}
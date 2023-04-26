<?php

namespace AppDIC\Classes;

use AppDIC\Interfaces\IUser;

class SecondUser implements IUser
{

    public function getName(): string
    {
        return __CLASS__ . ' name';
    }

    public function getRole(): string
    {
        return __CLASS__ . ' role';
    }
}
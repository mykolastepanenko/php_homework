<?php

namespace AppDIC\Classes;

use AppDIC\Interfaces\IUser;

class Three
{

    public function __construct(public int $number, protected IUser $user)
    {
    }
}
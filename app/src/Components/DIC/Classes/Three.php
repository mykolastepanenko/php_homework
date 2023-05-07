<?php

namespace Components\DIC\Classes;

use Components\DIC\Interfaces\IUser;

class Three
{

    public function __construct(public int $number, protected IUser $user)
    {
    }
}
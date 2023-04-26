<?php

namespace AppDIC\Classes;

use AppDIC\Interfaces\IUser;

class UserRepository
{
    /**
     *
     */
    public function __construct(public IUser $user /*public int $number*/)
    {
    }

    /**
     * @return void
     */
    public function save(): void
    {
        echo 'save user' . PHP_EOL;
    }

    /**
     * @return void
     */
    public function get(): void
    {
        echo 'get user' . PHP_EOL;
    }
}
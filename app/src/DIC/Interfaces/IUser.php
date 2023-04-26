<?php

namespace AppDIC\Interfaces;

interface IUser
{
    public function getName(): string;

    public function getRole(): string;
}
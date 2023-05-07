<?php

namespace Components\DIC\Interfaces;

interface IUser
{
    public function getName(): string;

    public function getRole(): string;
}
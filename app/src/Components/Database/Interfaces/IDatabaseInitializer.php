<?php

namespace Components\Database\Interfaces;

interface IDatabaseInitializer
{
    public function init(): null|object;
}
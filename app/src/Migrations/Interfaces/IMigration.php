<?php

namespace Migrations\Interfaces;

interface IMigration
{
    public function migrate(): void;
}
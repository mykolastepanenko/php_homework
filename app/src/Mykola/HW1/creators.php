<?php

namespace Mykola\Mykola\HW1;

use Door;
use Engine;
use OldDoor;
use OldEngine;
use OldWheel;
use OldWindow;
use Wheel;
use Window;

interface CarFactory
{
    function createEngine(): Engine;

    function createDoor(): Door;

    function createWindow(): Window;

    function createWheel(): Wheel;
}

class SportCarFactory implements CarFactory
{
    function createEngine(): Engine
    {
        return new SportEngine();
    }

    function createDoor(): Door
    {
        return new SportDoor();
    }

    function createWindow(): Window
    {
        return new SportWindow();
    }

    function createWheel(): Wheel
    {
        return new SportWheel();
    }
}

class OldCarFactory implements \CarFactory
{
    function createEngine(): Engine
    {
        return new OldEngine();
    }

    function createDoor(): Door
    {
        return new OldDoor();
    }

    function createWindow(): Window
    {
        return new OldWindow();
    }

    function createWheel(): Wheel
    {
        return new OldWheel();
    }
}

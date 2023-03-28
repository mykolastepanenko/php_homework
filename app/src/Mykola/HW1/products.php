<?php

namespace Mykola\Mykola\HW1;
interface Engine
{
    function turnOn();

    function turnOff();
}


interface Door
{
    function open();

    function close();
}

interface Window
{
}

interface Wheel
{
}

class SportEngine implements Engine
{
    function turnOn()
    {
        print_r("Sport engine turned on");
    }

    function turnOff()
    {
        print_r("Sport engine turned off");
    }
}

class SportDoor implements \Door
{
    function open()
    {
        print_r("Sport engine opened");
    }

    function close()
    {
        print_r("Sport door closed");
    }
}

class TaxyEngine implements Engine
{
    function turnOn()
    {
        print_r("Taxy engine turned on");
    }

    function turnOff()
    {
        print_r("Taxy engine turned off");
    }
}

class TaxyDoor implements Door
{
    function open()
    {
        print_r("Taxy engine opened");
    }

    function close()
    {
        print_r("Taxy door closed");
    }
}

class SportWindow implements Window
{
}

class SportWheel implements Wheel
{
}

class OldEngine implements Engine
{
    function turnOn()
    {
        print_r("Old engine turned on");
    }

    function turnOff()
    {
        print_r("Old engine turned off");
    }
}

class OldDoor implements Door
{
    function open()
    {
        print_r("Old door opened");
    }

    function close()
    {
        print_r("Old door closed");
    }
}

class OldWindow implements Window
{
}

class OldWheel implements Wheel
{
}

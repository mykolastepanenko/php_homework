<?php

namespace Mykola\Mykola\HW1;
use CarFactory;

include_once("creators.php");
include_once("products.php");

class App
{
    function __construct(CarFactory $carFactory)
    {
        $engine = $carFactory->createEngine();
        $door = $carFactory->createDoor();
        print_r($engine->turnOn());
        echo PHP_EOL;
        print_r($door->open());
    }
}

new App(new SportCarFactory());
//new App(new OldCarFactory());
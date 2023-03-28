<?php

namespace Mykola\Mykola\HW2;
use ICalculator;

class Application
{
    private $calculator;

    public function __construct(ICalculator $calculator)
    {
        $this->calculator = $calculator;
    }

    public function start()
    {
        $a = 14;
        $b = 7;
        echo PHP_EOL;
        echo '----------------------------------', PHP_EOL;
        echo 'Calculator from application class.', PHP_EOL;
        echo 'Input calculator type: ' . $this->calculator::class, PHP_EOL;
        echo '----------------------------------', PHP_EOL;
        echo "addition $a + $b = ", $this->calculator->addition($a, $b), PHP_EOL;
        echo "subtraction $a - $b = ", $this->calculator->subtraction($a, $b), PHP_EOL;
        echo "multiplication $a * $b = ", $this->calculator->multiplication($a, $b), PHP_EOL;
        echo "division $a / $b = ", $this->calculator->division($a, $b), PHP_EOL;
    }
}
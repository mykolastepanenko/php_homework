<?php

namespace Mykola\Mykola\HW2;
use ICalculator;

class Calculator implements ICalculator
{
    function addition(float $a, float $b): float
    {
        return $a + $b;
    }

    function subtraction(float $a, float $b): float
    {
        return $a - $b;
    }

    function multiplication(float $a, float $b): float
    {
        return $a * $b;
    }

    function division(float $a, float $b): float
    {
        return $a / $b;
    }
}
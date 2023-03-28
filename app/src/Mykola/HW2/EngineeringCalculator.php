<?php

namespace Mykola\Mykola\HW2;

class EngineeringCalculator extends Calculator implements IEngineeringCalculator
{
    function sqrt(float $number): float
    {
        return sqrt($number);
    }

    function tan(float $number): float
    {
        return tan($number);
    }

    function pow(float $number, float $exponent): float
    {
        return pow($number, $exponent);
    }

    function sin(float $number): float
    {
        return sin($number);
    }

    function cos(float $number): float
    {
        return cos($number);
    }

    function abs(float $number): float
    {
        return abs($number);
    }
}
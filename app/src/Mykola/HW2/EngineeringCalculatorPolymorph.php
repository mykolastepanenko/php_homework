<?php

namespace Mykola\Mykola\HW2;

class EngineeringCalculatorPolymorph extends EngineeringCalculator
{
    function pow(float $number, float $exponent): float
    {
        $result = 1;
        for ($i = 1; $i <= $exponent; $i++) {
            $result *= $number;
        }
        return $result;
    }

    function sqrt(float $number): float
    {
        return exp(log($number) / 2);
    }
}
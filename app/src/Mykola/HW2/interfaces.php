<?php

namespace Mykola\Mykola\HW2;
interface ICalculator
{
    function addition(float $a, float $b): float;

    function subtraction(float $a, float $b): float;

    function multiplication(float $a, float $b): float;

    function division(float $a, float $b): float;
}

interface IEngineeringCalculator extends \ICalculator
{
    function pow(float $number, float $exponent): float;

    function sqrt(float $number): float;

    function tan(float $number): float;

    function sin(float $number): float;

    function cos(float $number): float;

    function abs(float $number): float;
}
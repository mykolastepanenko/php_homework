<?php

use Mykola\Mykola\HW2\Application;
use Mykola\Mykola\HW2\Calculator;
use Mykola\Mykola\HW2\EngineeringCalculator;
use Mykola\Mykola\HW2\EngineeringCalculatorPolymorph;

require_once("./interfaces.php");
require_once("./Calculator.php");
require_once("./EngineeringCalculator.php");
require_once("./EngineeringCalculatorPolymorph.php");
require_once("./application.php");

$calculator = new Calculator();
$engineeringCalculator = new EngineeringCalculator();
$engineeringCalculatorPolymorph = new EngineeringCalculatorPolymorph();

$a = 5;
$b = 7;

echo "calculator addition $a + $b = ", $calculator->addition($a, $b), PHP_EOL;

echo PHP_EOL;

$b = 3;
echo "engineeringCalculator $a pow $b = ", $engineeringCalculator->pow(5, 3), PHP_EOL;
echo "engineeringCalculatorPolymorph $a pow: $b = ", $engineeringCalculatorPolymorph->pow(5, 3), PHP_EOL;

echo PHP_EOL;

$a = 25;
echo "engineeringCalculator sqrt $a = ", $engineeringCalculator->sqrt($a), PHP_EOL;
echo "engineeringCalculatorPolymorph sqrt $a = ", $engineeringCalculatorPolymorph->sqrt($a), PHP_EOL;

echo PHP_EOL;

$app = new Application($engineeringCalculator);
$app->start();

echo PHP_EOL;
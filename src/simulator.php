<?php

date_default_timezone_set('America/New_York');

include __DIR__ . '/../vendor/autoload.php';

use Time\Expressions\GaugeExpression;
use Time\Expressions\DirectionExpression;
use Time\Expressions\TimeExpression;
use Time\Expressions\MeasurementExpression;
use Time\Expressions\NumberExpression;
use Time\Expressions\UnitExpression;
use Time\TimeContext;


//
// time for now:            2015-01-31 12:34:56
//
$context = new TimeContext(new DateTime('2015-01-31 12:34:56'));
print "time for now:            " . $context->getTimeAsString() . PHP_EOL;


//
// a few hours in the past: 2015-01-31 09:34:56
//
$gauge = new GaugeExpression('a few', new UnitExpression('hours'));
$direction = new DirectionExpression('in the past');
$time = new TimeExpression($gauge, $direction);
print "a few hours in the past: " . $time->interpret($context) . PHP_EOL;


//
// thirty days ago:         2015-01-01 09:34:56
//
$measurement = new MeasurementExpression(new NumberExpression('thirty'), new UnitExpression('days'));
$gauge = new GaugeExpression($measurement);
$direction = new DirectionExpression('ago');
$time = new TimeExpression($gauge, $direction);
print "thirty days ago:         " . $time->interpret($context) . PHP_EOL;


//
// sometime soon:           2015-01-01 09:44:56
//
$context->setVariable('sometime soon', '10 minutes');
$gauge = new GaugeExpression('sometime soon');
$direction = new DirectionExpression('');
$time = new TimeExpression($gauge, $direction);
print "sometime soon:           " . $time->interpret($context) . PHP_EOL;


//
// a long time goes by:     2017-01-01 09:44:56
//
$gauge = new GaugeExpression('a long time');
$direction = new DirectionExpression('goes by');
$time = new TimeExpression($gauge, $direction);
print "a long time goes by:     " . $time->interpret($context) . PHP_EOL;


//
// a short time ago:        2017-01-01 09:34:56
//
$gauge = new GaugeExpression('a short time');
$direction = new DirectionExpression('ago');
$time = new TimeExpression($gauge, $direction);
print "a short time ago:        " . $time->interpret($context) . PHP_EOL;

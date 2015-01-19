<?php

date_default_timezone_set('America/New_York');

include __DIR__ . '/../vendor/autoload.php';

$parser = new Time\TimeExpressionParser(new Support\NumberParser);
$context = new Time\TimeContext(new DateTime('2015-01-31 12:34:56'));
$context->setVariable('sometime soon', '10 minutes');

// time for now:            2015-01-31 12:34:56
print "time for now:            " . $context->getTimeAsString() . PHP_EOL;

// a few hours in the past: 2015-01-31 09:34:56
print "a few hours in the past: " . $parser->interpret('a few hours in the past', $context) . PHP_EOL;

// thirty days ago:         2015-01-01 09:34:56
print "thirty days ago:         " . $parser->interpret('thirty days ago', $context) . PHP_EOL;

// sometime soon:           2015-01-01 09:44:56
print "sometime soon:           " . $parser->interpret('sometime soon', $context) . PHP_EOL;

// a long time goes by:     2017-01-01 09:44:56
print "a long time goes by:     " . $parser->interpret('a long time goes by', $context) . PHP_EOL;

// a short time ago:        2017-01-01 09:34:56
print "a short time ago:        " . $parser->interpret('a short time ago', $context) . PHP_EOL;

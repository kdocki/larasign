<?php

require_once __DIR__ . '/../vendor/autoload.php';

//
// see how much memory this takes up without flyweight
//
$memory1 = memory_get_usage();
$time1 = microtime(true);

$people1 = array();

for ($i = 0; $i < 100000; $i++)
{
	$person = new Person;
	$person->last_login = RandomDate::between('2014-11-01', '2014-12-01');
	$people1[] = $person;
}

$memory = round((memory_get_usage() - $memory1) / (1024 * 1024), 2);
$time = round(microtime(true) - $time1, 2);

print "Without flyweight, {$memory}MB of memory and {$time}s" . PHP_EOL;



//
// do it with flyweight now...
//
$memory1 = memory_get_usage();
$time1 = microtime(true);
$people2 = array();

for ($i = 0; $i < 100000; $i++)
{
	$person = new Person;
	$person->last_login = DateKeeper::fetch(RandomDate::between('2014-11-01', '2014-12-01'));
	$people2[] = $person;
}

$memory = round((memory_get_usage() - $memory1) / (1024 * 1024), 2);
$time = round(microtime(true) - $time1, 2);

print "With flyweight, {$memory}MB of memory and {$time}s" . PHP_EOL;
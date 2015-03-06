<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/personInfo.php';

$app = require_once __DIR__.'/../bootstrap/start.php';

ob_start();
$app->run();
ob_clean();

$person = new Person;
$person->email = 'testing@test.com';
$person->save();

$snapshot1 = serialize($person);
$person->email = "something@else.com";
$person = unserialize($snapshot1);

print $person->isDirty() === false ? '' : 'isDirty' . PHP_EOL;
print personInfo('unserialized person', $person);
<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/personInfo.php';

$app = require_once __DIR__.'/../bootstrap/start.php';

$person = new Person;
$person->name = "Kelt";
$snapshot1 = $person->snapshot();

$person->setTable('persons');
$person->name = "test name";
$person->email = "testing@test.com";
$snapshot2 = $person->snapshot();

print personInfo("this is how person looks now", $person);

$person->restore($snapshot1);
print personInfo("restoring snapshot 1", $person);

$person->restore($snapshot2);
print personInfo("restoring snapshot 2", $person);
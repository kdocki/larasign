<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/personInfo.php';

$app = require_once __DIR__.'/../bootstrap/start.php';

$person = new Person;
$person->setTable('persons');
$person->email = 'testing@test.com';
$snapshot1 = serialize($person);

$person->setTable('crm_people');
$person->email = "some-new@email.com";
print personInfo('examining person object', $person);

$person = unserialize($snapshot1);
print personInfo('restoring snapshot 1', $person);
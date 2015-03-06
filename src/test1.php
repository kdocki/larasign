<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/personInfo.php';

$app = require_once __DIR__.'/../bootstrap/start.php';

##################################################
# Eloquent has syncOriginal() and getAttributes()
# and getOriginal().
#
# We could use this to create a snapshot mechanism
# but it is not quite the memento pattern because
# we don't have a way to revert back to original
# data without creating a new person object. We
# also cannot revert other protected properties
# such as $table, $timestamps, $relations, etc...
##################################################

$person1 = new Person;
$person1->name = 'Kelt';
$snapshot1 = $person1->getAttributes();

$person2 = new Person($snapshot1);
print personInfo('New person from attributes of person1', $person2);

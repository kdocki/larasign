<?php

require_once __DIR__ . '/../vendor/autoload.php';

#####################################################
### Generic Example using SplSubject, SplObserver ###
#####################################################

$subject1 = new RealSubject('subject1');
$observer1 = new RealObserver('observer1');
$observer2 = new RealObserver('observer2');
$observer3 = new RealObserver('observer3');

$subject1->attach($observer1);
$subject1->attach($observer2);
$subject1->attach($observer3);

$subject1->notify();
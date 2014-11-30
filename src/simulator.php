<?php

require __DIR__ . '/../vendor/autoload.php';


// client
$tv = new Television\Television;
$control = new Television\RemoteControl;
$volumeUp = new Television\ChangeVolume($tv, 1);
$volumeUpFour = new Television\ChangeVolume($tv, 4);
$volumeDown = new Television\ChangeVolume($tv, -1);


$control->invoke($volumeUp);	// 1
$control->invoke($volumeUp);	// 2
$control->invoke($volumeDown);	// 1
$control->invoke($volumeUp);	// 2
$control->invoke($volumeUp);	// 3 <-- 6 more
$control->invoke($volumeDown);	// 2
$control->invoke($volumeUpFour);// 6
$control->invoke($volumeUpFour);// 10
$control->invoke($volumeUp);	// 11
$control->invoke($volumeUp);	// 12
$control->invoke($volumeUp);	// 13 <-- 4 ago

$control->invoke($volumeUp);	// 14
$control->invoke($volumeUp);	// 15
$control->invoke($volumeUp);	// 16
$control->invoke($volumeDown);	// 15 <-- current

print $tv->getVolume() . PHP_EOL;

$control->undo(4);

print $tv->getVolume() . PHP_EOL;

$control->undo(6);

print $tv->getVolume() . PHP_EOL;

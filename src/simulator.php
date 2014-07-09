<?php

require __DIR__ . '/../vendor/autoload.php';

$director = new Architect;
$builder1 = new NoviceCarpenter;
$builder2 = new ExpertCarpenter;

$director->createMyOldHouse($builder1);
$director->createMyOldHouse($builder2);

print '-- Novice Carpenter --' . PHP_EOL;
print $builder1->getHouse();
print PHP_EOL . '-- Expert Carpenter --' . PHP_EOL;
print $builder2->getHouse();
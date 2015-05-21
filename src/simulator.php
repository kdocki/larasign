<?php

require __DIR__ . '/../vendor/autoload.php';

$writer = new MagazineWriter;
$writer->write();

print "-------------------------------\n";

$writer = new SoftwareWriter;
$writer->write();
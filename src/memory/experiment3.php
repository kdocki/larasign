<?php

$storage = [];
$a = array_fill(0, 200000, 'abc');

for ($i = 0; $i < 1000; $i++)
{
	$storage[$i] = $a;
}

print $storage[999][3] . PHP_EOL;
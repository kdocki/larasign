<?php

require __DIR__ . '/../vendor/autoload.php';

$benchmark1 = memory_get_usage();

$baseDir = __DIR__ . '/../';

$files = ['files/file1.txt', 'files/file2.txt', 'files/file3.txt'];

foreach ($files as $index => $file)
{
	$files[$index] = new File\FileReaderProxy($baseDir . $file);
}

$benchmark2 = memory_get_usage();

$difference = $benchmark2 - $benchmark1;

print "Memory used: {$difference}" . PHP_EOL;
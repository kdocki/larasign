<?php

include __DIR__ . '/../../vendor/autoload.php';

$faker = Faker\Factory::create();
$faker->seed(42);
$storage = [];

$checkOne = memory_get_usage();

for ($i = 0; $i < 100000; $i++)
{
	$storage[] = new Person($faker->firstName, $faker->boolean() ? 'Male' : 'Female');
}

$checkTwo = memory_get_usage();

print round(abs($checkTwo - $checkOne) / (1024*1024)) . 'MB memory' . PHP_EOL;
// 44MB memory
<?php

require_once __DIR__ . '/../vendor/autoload.php';

$movies = new Movies;
$movies->add(new Movie('Ponyo', 'G'));
$movies->add(new Movie('Kill Bill', 'R'));
$movies->add(new Movie('The Santa Clause', 'PG'));
$movies->add(new Movie('Guardians of the Galaxy', 'PG-13'));
$movies->add(new Movie('Reservoir dogs', 'R'));
$movies->add(new Movie('Sharknado', 'PG-13'));
$movies->add(new Movie('Back to the Future', 'PG'));


print 'MOVIE LISTING' . PHP_EOL;

// prints all the movies in this collection
// by taking advantage of internal Traversable iterface
foreach ($movies as $movie)
{
	print ' - ' . $movie->title() . PHP_EOL;
}

print PHP_EOL . 'RATED R ONLY' . PHP_EOL;

// now we only print rated R movies
// with iterators it's easy as pie
foreach ($movies->rated('R') as $movie)
{
	print ' - ' . $movie->title() . PHP_EOL;
}

print PHP_EOL . 'IN REVERSE ORDER' . PHP_EOL;

// now we only print rated R movies
// with iterators it's easy as pie
foreach ($movies->reverse() as $movie)
{
	print ' - ' . $movie->title() . PHP_EOL;
}
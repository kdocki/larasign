<?php

$numbers = new CachingIterator(new ArrayIterator([1, 2, 3, 1, 4, 6, 3, 9]));

foreach ($numbers as $currentNumber)
{
	$sign = '';

	if ($numbers->hasNext())
	{
		$nextNumber = $numbers->getInnerIterator()->current();
		$sign = $nextNumber > $currentNumber ? '>' : '<';
	}

	print $sign ? "$currentNumber $sign " : $currentNumber;
}

print PHP_EOL;
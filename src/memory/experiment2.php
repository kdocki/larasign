<?php

function print_memory($step)
{
	print "Step #{$step} - " . memory_get_usage() . PHP_EOL;
}

print_memory(1);				// 226536 bytes
$a = array_fill(0, 200000, 0);	// new memory allocated in Address#1
print_memory(2); 				// 19924088 bytes
$b = $a; 						// address of $b equals address $a
print_memory(3); 				// 19924176 bytes
$b[4] = 4;						// new memory allocated Address#2
print_memory(4); 				// 39621528 bytes

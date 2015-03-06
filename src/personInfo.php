<?php

function personInfo($statement, $person)
{
	return $statement . PHP_EOL .
		'name: ' . $person->name .
		', table: ' . $person->getTable() .
		', email: ' . $person->email . PHP_EOL;
}
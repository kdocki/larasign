<?php

class DateKeeper
{
	static private $dates = array();

	static public function fetch($dateAsString)
	{
		$datetime = is_a($dateAsString, 'DateTime') ? $dateAsString : new DateTime($dateAsString);

		$index = $datetime->format('Y-m-d');

		if (!array_key_exists($index, static::$dates))
		{
			static::$dates[$index] = $datetime;
		}

		return static::$dates[$index];
	}
}
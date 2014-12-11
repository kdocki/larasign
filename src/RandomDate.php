<?php

class RandomDate
{
	static public $faker;

	static public function faker($seed = 42)
	{
		if (!static::$faker)
		{
			static::$faker = Faker\Factory::create();
			static::$faker->seed($seed);
		}

		return static::$faker;
	}

	static public function between($start, $end)
	{
		return static::faker()->dateTimeBetween($start, $end);
	}
}
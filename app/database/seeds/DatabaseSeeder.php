<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		Car::create([
			'id' => 1,
			'model' => 'Honda',
			'year' => '2009',
			'vin' => Str::random(32),
			'description' => 'motor still good, transmission may be going out',
		]);

		Car::create([
			'id' => 2,
			'model' => 'Chevy',
			'year' => '2011',
			'vin' => Str::random(32),
			'description' => 'check light engine is on',
		]);

		Car::create([
			'id' => 3,
			'model' => 'Ford',
			'year' => '1999',
			'vin' => Str::random(32),
			'description' => 'broken windows, radio still works, a/c bad, poop stain in back',
		]);
	}

}

<?php

class Architect
{
	public function createMyOldHouse(Carpenter $builder)
	{
		// house foundation
		$builder->outside(25, 13);

		// master bedroom
		$builder->sidewall(5, range(1, 9));
		$builder->wall(range(1, 5), 10);
		$builder->wall(range(2, 5), 5);
		$builder->door(5, 4, 'left bottom');
		$builder->door(1, 5, 'left bottom');
		$builder->door(5, 9, 'left bottom');

		// bathrooms
		$builder->sidewall(2, range(6, 9));

		// bedroom 2
		$builder->wall(range(8, 11), 10);
		$builder->wall(8, 7);
		$builder->wall(range(8, 11), 5);
		$builder->sidewall(7, range(1, 9));
		$builder->blank(7, 6);
		$builder->door(8, 6, 'entry right');

		// bedroom 3
		$builder->blank(7, 4);
		$builder->door(8, 4);
		$builder->wall(8, 3, 'right side');

		// living room closets
		$builder->wall(11, 14, 'left wall');
		$builder->wall(10, 14);
		$builder->wall(range(10, 11), 15);
		$builder->wall(range(10, 11), 17);
		$builder->sidewall(9, range(14, 18));
		$builder->door(9, 16);
		$builder->door(11, 14);

		// kitchen area
		$builder->sidewall(5, 19);
		$builder->wall(range(6, 12), range(19, 20));
		$builder->sidewall(5, 23);
		$builder->wall(range(6, 12), 23);

		// laundry area
		$builder->door(11, 21, 'entry right');
		$builder->sidewall(10, 22);

		// front exterior door
		$builder->wall(12, 10, 'left wall');
		$builder->door(12, 11, 'left entry');
		$builder->blank(12, 12);

		// back exterior door
		$builder->door(1, 15);
		$builder->blank(0, 15);

		// master bedroom closet
		$builder->blank(5, 1);
		$builder->wall(6, 2);

		// hallway closet
		$builder->sidewall(6, 1);
		$builder->door(7, 2, 'left wall');

		// labels for rooms
		$builder->label(3, 2, 'MB');
		$builder->label(1, 7, 'Ba');
		$builder->label(4, 7, 'Ba');
		$builder->label(10, 2, 'Br');
		$builder->label(10, 7, 'Br');
		$builder->label(5, 14, 'LR');
		$builder->label(8, 21, ' K');
		$builder->label(11, 22, ' U');
	}

}
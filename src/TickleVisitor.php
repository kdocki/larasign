<?php

class TickleVisitor implements Visitor
{
	public function visitWoman(Woman $woman)
	{
		print "the woman named {$woman->name} was tickled\n";
	}

	public function visitChicken(Chicken $chicken)
	{
		print "the {$chicken->type} chicken was tickled\n";
	}
}
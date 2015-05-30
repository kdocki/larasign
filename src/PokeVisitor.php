<?php

class PokeVisitor implements Visitor
{
	public function visitWoman(Woman $woman)
	{
		print "the woman named {$woman->name} was poked\n";
	}

	public function visitChicken(Chicken $chicken)
	{
		print "the {$chicken->type} chicken was poked\n";
	}
}
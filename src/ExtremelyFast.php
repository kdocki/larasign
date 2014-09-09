<?php

class ExtremelyFast extends ModifiedMonster
{
	public function speed()
	{
		return parent::speed() * 2;
	}

	public function jumpAttack()
	{
		return "jump and attack!";
	}
}

<?php

abstract class ModifiedMonster extends Monster
{
	protected $monster;

	public function __construct(Monster $monster) { $this->monster = $monster; }

	public function intelligence() { return $this->monster->intelligence(); }
	public function strength() { return $this->monster->strength(); }
	public function speed() { return $this->monster->speed(); }
}
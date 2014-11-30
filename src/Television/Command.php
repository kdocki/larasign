<?php namespace Television;

interface Command
{
	public function fire();

	public function undo();
}
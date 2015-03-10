<?php

interface CheeseCutter
{
	public function nearBy(CheeseSmeller $smeller);
	public function noLongerNearBy(CheeseSmeller $smeller);
	public function cuts($cheese);
}
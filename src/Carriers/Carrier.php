<?php namespace Carriers;

interface Carrier
{
	public function sendMessage($message);
}
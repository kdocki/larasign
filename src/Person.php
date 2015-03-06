<?php

class Person extends Eloquent implements Snapshots
{
	use EloquentSnapshots;
	protected $fillable = array('name');
}
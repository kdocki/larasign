<?php

class Car extends Eloquent
{
	protected $observables = ['finding', 'found'];

	public static function find($id, $columns = array('*'))
	{
		$shouldProceed = static::triggerModelEvent('finding', $stop = false, $id);

		if (!$shouldProceed) return;

		$results = parent::find($id, $columns);

		static::triggerModelEvent('found', $stop = false, $results);

		return $results;
	}

	protected static function triggerModelEvent($event, $halt, $params = null)
	{
		if ( ! isset(static::$dispatcher)) return true;

		$event = "eloquent.{$event}: ".get_called_class();

		$method = $halt ? 'until' : 'fire';

		return static::$dispatcher->$method($event, $params);
	}
}
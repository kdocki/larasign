<?php

trait EloquentSnapshots
{
	public function snapshot()
	{
		$items = [];

		$keys = [
			'connection', 'table', 'primaryKey',
			'perPage', 'incrementing', 'timestamps',
			'attributes', 'original', 'relations',
			'hidden', 'visible', 'appends',
			'fillable', 'guarded', 'dates',
			'touches', 'observables', 'with',
			'morphClass', 'exists',
		];

		foreach ($keys as $key)
		{
			$items[$key] = $this->$key;
		}

		return new Snapshot($items);
	}

	public function restore(Snapshot $snapshot)
	{
		foreach ($snapshot->items() as $key => $value)
		{
			$this->$key = $value;
		}
	}
}
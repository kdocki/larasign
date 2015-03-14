<?php namespace Observers;

class LookupObserver
{
	public function finding($id)
	{
		if ($id < 1) return false;

		print "finding id {$id}!\n";
	}

	public function found($model)
	{
		print "found model {$model->id}\n";
	}
}
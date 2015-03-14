<?php namespace Observers;

class PrinterObserver
{
	public function creating($model)
	{
		print "creating model" . PHP_EOL;
	}

	public function created($model)
	{
		print "created model" . PHP_EOL;
	}

	public function updating($model)
	{
		print "updating model" . PHP_EOL;
	}

	public function updated($model)
	{
		print "updated model" . PHP_EOL;
	}

	public function saving($model)
	{
		print "saving model" . PHP_EOL;
	}

	public function saved($model)
	{
		print "saved model" . PHP_EOL;
	}

	public function deleting($model)
	{
		print "deleting model" . PHP_EOL;
	}

	public function deleted($model)
	{
		print "deleted model" . PHP_EOL;
	}

	public function restoring($model)
	{
		print "restoring model" . PHP_EOL;
	}

	public function restored($model)
	{
		print "restored model" . PHP_EOL;
	}
}

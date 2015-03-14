<?php namespace Observers;

class VinObserver
{
	public function updating($model)
	{
		// if vin has not changed,
		// then ignore the rest of this observer

		$original = $model->getOriginal('vin');

		if ($model->vin === $original)
		{
			return true;
		}

		// check for the letter h in our vin
		// number... if it isn't there then
		// don't let the model save to database
		if (strpos($model->vin, 'h') === false)
		{
			print "model vin does not contain letter 'h', canceling update...\n";
			return false;
		}
	}

	public function saved($model)
	{
		print "model was saved to database\n";
	}
}
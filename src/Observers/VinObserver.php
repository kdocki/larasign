<?php namespace Observers;

class VinObserver
{
	public function updating($model)
	{
		$original = $model->getOriginal('vin');

		if ($model->vin === $original)
		{
			return true;	// ignore unchanged vin
		}

		// check for the letter h in our vin
		// number... if it isn't there then
		// don't let the model save to database
		if (strpos($model->vin, 'h') === false)
		{
			print "model vin does not contain letter 'h', canceling update...\n";
			return false;
		}

		print "model vin contains letter 'h', updating vin...\n";
	}
}
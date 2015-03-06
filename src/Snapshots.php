<?php

interface Snapshots
{
	public function snapshot();
	public function restore(Snapshot $snapshot);
}
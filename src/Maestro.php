<?php

class Maestro
{
	public function conduct($song)
	{
		$tubaPlayer = App::make('tuba.player');
		$clarinetPlayer = App::make('clarinet.player');

		foreach([$tubaPlayer, $clarinetPlayer] as $player)
		{
			$player->play($song);
		}
	}
}
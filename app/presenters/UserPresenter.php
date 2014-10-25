<?php

class UserPresenter extends Presenter
{
	public function presentFavoriteColorStyle()
	{
		return $this->favoriteColor ? "style=\"background-color: {$this->favoriteColor};\"" : '';
	}
}
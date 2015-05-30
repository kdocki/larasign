<?php

interface Visitable
{
	public function accept(Visitor $visitor);
}

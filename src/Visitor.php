<?php

interface Visitor
{
	function visitWoman(Woman $woman);
	function visitChicken(Chicken $chicken);
}
<?php namespace Time\Expressions;

use Time\TimeContext;

interface BaseExpression
{
	public function interpret(TimeContext $context);
}
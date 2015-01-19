<?php namespace Time\Expressions;

use Time\TimeContext;

// <time> ::= <gauge> <direction>
class TimeExpression implements BaseExpression
{
	public function __construct(BaseExpression $gauge, BaseExpression $direction)
	{
		$this->gauge = $gauge;
		$this->direction = $direction;
	}

	public function interpret(TimeContext $context)
	{
		$gauge = $this->gauge->interpret($context);
		$direction = $this->direction->interpret($context);

		if ($direction != '')
		{
			$time = $context->getTime();
			$time->modify($direction . $gauge);
			$context->setTime($time);
		}

		return $context->getTimeAsString();
	}
}
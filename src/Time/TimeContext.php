<?php namespace Time;

class TimeContext
{
	protected $time;

	protected $variables;

	public function __construct(\DateTime $time)
	{
		$this->time = $time;
		$this->variables = [];
	}

	public function getTime()
	{
		return $this->time;
	}

	public function setTime(\DateTime $time)
	{
		$this->time = $time;
	}

	public function getTimeAsString($format = 'Y-m-d H:i:s')
	{
		return $this->time->format($format);
	}

	public function getVariable($key, $default = null)
	{
		return $this->hasVariable($key) ? $this->variables[$key] : $default;
	}

	public function setVariable($key, $value)
	{
		$this->variables[$key] = $value;
	}

	public function hasVariable($key)
	{
		return is_string($key) && array_key_exists($key, $this->variables);
	}

	public function unsetVariable($key)
	{
		unset($this->variables[$key]);
	}
}

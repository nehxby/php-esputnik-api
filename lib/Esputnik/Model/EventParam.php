<?php

namespace Esputnik\Model;

class EventParam extends AbstractModel
{
	protected string $name;

	protected string $value;

	public function __construct(string $name, string $value)
	{
		$this->name = $name;
		$this->value = $value;
	}

	public function getValue(): string
	{
		return $this->value;
	}

	public function getName(): string
	{
		return $this->name;
	}
}

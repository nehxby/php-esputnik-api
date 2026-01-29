<?php

namespace Esputnik\Model;

class MessageParam extends AbstractModel
{
	protected string $key;
	protected mixed $value;

	public function __construct(string $key, mixed $value)
	{
		$this->key = $key;
		$this->value = $value;
	}

	public function getKey(): string
	{
		return $this->key;
	}

	public function getValue()
	{
		return $this->value;
	}
}

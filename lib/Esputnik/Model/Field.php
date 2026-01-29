<?php

namespace Esputnik\Model;

class Field extends AbstractModel
{
	protected int $id;
	protected mixed $value;

	public function __construct(int $id, mixed $value)
	{
		$this->id = $id;
		$this->value = $value;
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function getValue()
	{
		return $this->value;
	}
}

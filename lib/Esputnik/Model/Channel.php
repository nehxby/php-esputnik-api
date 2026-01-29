<?php

namespace Esputnik\Model;

class Channel extends AbstractModel
{
	public const string TYPE_EMAIL = 'email';
	public const string TYPE_SMS = 'sms';

	protected string $type;
	protected string $value;

	public function __construct(string $type, string $value)
	{
		$this->type = $type;
		$this->value = $value;
	}

	public function getType(): string
	{
		return $this->type;
	}

	public function getValue(): string
	{
		return $this->value;
	}
}

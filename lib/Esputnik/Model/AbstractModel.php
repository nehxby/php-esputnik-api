<?php

namespace Esputnik\Model;

class AbstractModel implements \JsonSerializable
{

	public function jsonSerialize(): array
	{
		return get_object_vars($this);
	}
}

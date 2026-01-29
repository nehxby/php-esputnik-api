<?php

namespace Esputnik\Api;

use Esputnik\Exception\ErrorException;
use GuzzleHttp\Exception\GuzzleException;

class Group extends AbstractApi
{
	/**
	 * Поиск всех контактов в группе.
	 *
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function contacts($id, array $parameters = [])
	{
		return $this->get('group/' . rawurlencode($id) . '/contacts', [], $parameters);
	}
}

<?php

namespace Esputnik\Api;

use Esputnik\Exception\ErrorException;
use GuzzleHttp\Exception\GuzzleException;

class Groups extends AbstractApi
{
	/**
	 * Поиск группы
	 *
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function search(string $name, array $parameters = [])
	{
		return $this->get('groups/', ['name' => $name], $parameters);
	}

	/**
	 * Показать все группы
	 *
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function all(array $parameters = [])
	{
		return $this->get('groups/', [], $parameters);
	}
}

<?php

namespace Esputnik\Api;

use Esputnik\Exception\ErrorException;
use GuzzleHttp\Exception\GuzzleException;

class Balance extends AbstractApi
{
	/**
	 * Получить баланс организации.
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function show()
	{
		return $this->get('balance/');
	}
}

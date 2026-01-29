<?php

namespace Esputnik\Api;

use Esputnik\Exception\ErrorException;
use GuzzleHttp\Exception\GuzzleException;

class Callouts extends AbstractApi
{
	/**
	 * Получить статистику sms-рассылок.
	 *
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function sms(array $parameters = [])
	{
		return $this->get('callouts/sms/', [], $parameters);
	}
}

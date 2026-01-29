<?php

namespace Esputnik\Api;

use Esputnik\Exception\ErrorException;
use GuzzleHttp\Exception\GuzzleException;

class Sms extends AbstractApi
{
	/**
	 * Вывести все sms сообщения
	 *
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function all(array $parameters = [])
	{
		return $this->get('messages/sms', [], $parameters);
	}


	/**
	 * Search sms messages by part of name or tag.
	 *
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function search(string $query, array $parameters = [])
	{
		return $this->get('messages/sms', ['search' => $query], $parameters);
	}
}

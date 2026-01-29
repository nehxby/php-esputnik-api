<?php

namespace Esputnik\Api;

use Esputnik\Exception\ErrorException;
use GuzzleHttp\Exception\GuzzleException;

class Unsubscribe extends AbstractApi
{
	/**
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function add(array $emails)
	{
		return $this->post('emails/unsubscribe/add', [
			'emails' => $emails,
		]);
	}

	/**
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function remove(array $emails)
	{
		return $this->post('emails/unsubscribe/delete', [
			'emails' => $emails,
		]);
	}
}

<?php

namespace Esputnik\Api;

use Esputnik\Exception\ErrorException;
use GuzzleHttp\Exception\GuzzleException;

class Interfaces extends AbstractApi
{
	/**
	 * @throws GuzzleException
	 * @throws ErrorException
	 */
	public function all()
	{
		return $this->get('interfaces/sms');
	}
}

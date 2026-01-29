<?php

namespace Esputnik\Api;

use Esputnik\Exception\ErrorException;
use GuzzleHttp\Exception\GuzzleException;

class ImportStatus extends AbstractApi
{
	/**
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function getStatus($sessionId)
	{
		return $this->get('importstatus/' . rawurlencode($sessionId));
	}
}

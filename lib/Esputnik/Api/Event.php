<?php

namespace Esputnik\Api;

use Esputnik\Exception\ErrorException;
use Esputnik\Model\Event as EventModel;
use GuzzleHttp\Exception\GuzzleException;

class Event extends AbstractApi
{
	/**
	 * Сгенерировать событие.
	 *
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function add(EventModel $event)
	{
		return $this->post('event/', $event);
	}
}

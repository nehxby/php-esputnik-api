<?php

namespace Esputnik\Api;

use Esputnik\Model\Event as EventModel;

class Event extends AbstractApi
{
	/**
	 * Сгенерировать событие.
	 *
	 * @param EventModel $event
	 * @return \Psr\Http\Message\StreamInterface
	 */
	public function add(EventModel $event)
	{
		return $this->post('event/', $event);
	}
}

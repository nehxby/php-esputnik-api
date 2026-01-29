<?php

namespace Esputnik\Api;

use Esputnik\Exception\ErrorException;
use GuzzleHttp\Exception\GuzzleException;

class AddressBooks extends AbstractApi
{
	/**
	 * Получить список каталогов.
	 * Каталог содержит списки дополнительных полей для контактов, которые доступны в вашей организации.
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function all()
	{
		return $this->get('addressbooks/');
	}
}

<?php

namespace Esputnik\Api;

use Esputnik\Exception\ErrorException;
use Esputnik\Model\EmailMessage;
use GuzzleHttp\Exception\GuzzleException;

class Messages extends AbstractApi
{
	/**
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function add(EmailMessage $emailMessage)
	{
		return $this->post('messages/email/', $emailMessage);
	}

	/**
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function all(array $parameters = [])
	{
		return $this->get('messages/email/', [], $parameters);
	}

	/**
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function search(string $searchQuery, array $parameters = [])
	{
		return $this->get('messages/email/', ['search' => $searchQuery], $parameters);
	}

	/**
	 * Get email message.
	 *
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function show($id)
	{
		return $this->get('messages/email/' . rawurlencode($id));
	}

	/**
	 * Delete email message.
	 *
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function remove($id)
	{
		return $this->delete('messages/email/' . rawurlencode($id));
	}

	/**
	 * Update email message.
	 *
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function update($id, EmailMessage $emailMessage)
	{
		return $this->put('messages/email/' . rawurlencode($id), $emailMessage);
	}
}

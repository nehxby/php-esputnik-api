<?php

namespace Esputnik\Api;

use Esputnik\Exception\ErrorException;
use Esputnik\Exception\MissingArgumentException;
use Esputnik\Model\Contact as ContactModel;
use Esputnik\Model\Group as GroupModel;
use Esputnik\Model\MessageParam;
use Esputnik\Model\ParametrizedRecipient;
use GuzzleHttp\Exception\GuzzleException;

class Message extends AbstractApi
{
	/**
	 * Отправка рассылки по заранее созданному сообщению. Сообщение может дополнительно параметризироваться.
	 *
	 * @param MessageParam[] $params
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function send(
		int          $id,
		ContactModel $contact,
		bool         $isEmail,
		array        $params,
		string       $fromName,
		?array       $recipients = NULL,
		?GroupModel  $group = NULL
	)
	{

		$queryParams = [
			'contactId' => $contact->getId(),
			'email'     => $isEmail,
			'params'    => $params,
			'fromName'  => $fromName,
		];

		if ($group) {
			$queryParams['groupId'] = $group->getId();
		}

		if ($recipients) {
			$queryParams['recipients'] = $recipients;
		}

		return $this->post('message/' . rawurlencode((string)$id) . '/send', $queryParams);
	}

	/**
	 * Отправка подготовленного сообщения одному или многим контактам.
	 * Сообщение может параметризироваться для каждого контакта отдельно.
	 *
	 * @param ParametrizedRecipient[] $recipients
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function smartSend(int $id, array $recipients, bool $isEmail, string $fromName)
	{
		$queryParams = [
			'recipients' => $recipients,
			'email'      => $isEmail,
			'fromName'   => $fromName
		];

		return $this->post('message/' . rawurlencode((string)$id) . '/smartsend', $queryParams);
	}

	/**
	 * Отправить email-сообщение. Если контакта с таким адресом нет, он будет создан.
	 *
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function email(string $from, string $subject, string $htmlText, string $plainText, array $emails, array $tags)
	{
		$queryParams = [
			'from'      => $from,
			'subject'   => $subject,
			'htmlText'  => $htmlText,
			'plainText' => $plainText,
			'emails'    => $emails,
			'tags'      => $tags,
		];

		return $this->post('message/email/', $queryParams);
	}

	/**
	 * Получить статус одиночного email сообщения.
	 *
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function emailStatus(array $ids)
	{
		return $this->get('message/email/status/', [
			'ids' => join(',', $ids)
		]);
	}

	/**
	 * Отправить sms-сообщение. Если контакта с таким номером телефона нет, он будет создан.
	 *
	 * @param string[] $tags
	 * @param string[] $phoneNumbers
	 * @throws ErrorException
	 * @throws GuzzleException
	 * @throws MissingArgumentException
	 */
	public function sms(string $from, string $text, array $tags = [], array $phoneNumbers = [], ?int $groupId = NULL)
	{
		$queryParams = [
			'from' => $from,
			'text' => $text,
		];
		if (empty($phoneNumbers) and !$groupId) {
			throw new MissingArgumentException(['phoneNumbers', 'groupId']);
		}

		if (!empty($phoneNumbers)) {
			$queryParams['phoneNumbers'] = $phoneNumbers;
		}
		if ($groupId) {
			$queryParams['groupId'] = $groupId;
		}
		if (!empty($tags)) {
			$queryParams['tags'] = $tags;
		}

		return $this->post('message/sms/', $queryParams);
	}

	/**
	 * Получить статус одиночного sms сообщения.
	 *
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function smsStatus(array $ids)
	{
		return $this->get('message/sms/status/', [
			'ids' => join(',', $ids)
		]);
	}
}

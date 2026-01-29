<?php

namespace Esputnik\Api;

use Esputnik\Exception\ErrorException;
use GuzzleHttp\Exception\GuzzleException;

class Contacts extends AbstractApi
{
	public const string DEDUPE_ON_EMAIL = 'email';
	public const string DEDUPE_ON_SMS = 'sms';
	public const string DEDUPE_ON_EMAIL_OR_SMS = 'email_or_sms';
	public const string DEDUPE_ON_PUSH = 'push';
	public const string DEDUPE_ON_WEBPUSH = 'webpush';
	public const string DEDUPE_ON_EXTERNAL_ID = 'externalCustomerId';

	/**
	 * Поиск контактов.
	 *
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function all(int $offset = 1)
	{
		return $this->get('contacts/', ['startindex' => $offset]);
	}

	/**
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function search(array $query, array $parameters = [])
	{
		return $this->get('contacts/', $query, $parameters);
	}

	/**
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function update(array $contacts, $dedupeOn, array $contactFields, array $customFieldsIDs, array $groupNames,
	                       bool  $restoreDeleted = FALSE)
	{
		$parameters = [
			'contacts'        => $contacts,
			'dedupeOn'        => $dedupeOn,
			//'fieldId' => '', // not implemented
			'contactFields'   => $contactFields,
			'customFieldsIDs' => $customFieldsIDs,
			'groupNames'      => $groupNames,
			//'groupNamesExclude' => [], // not implemented
			'restoreDeleted'  => $restoreDeleted,
			//'eventKeyForNewContacts' => '', // not implemented
		];
		return $this->post('contacts/', $parameters);
	}

	/**
	 * Получить email по идентификатору контакта
	 *
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function getEmail(array $ids)
	{
		return $this->get('contacts/email', [
			'emails' => implode(',', $ids)
		]);
	}
}

<?php

namespace Esputnik\Api;

class Contacts extends AbstractApi
{
	const DEDUPE_ON_EMAIL = 'email';
	const DEDUPE_ON_SMS = 'sms';
	const DEDUPE_ON_EMAIL_OR_SMS = 'email_or_sms';
	const DEDUPE_ON_PUSH = 'push';
	const DEDUPE_ON_WEBPUSH = 'webpush';
	const DEDUPE_ON_EXTERNAL_ID = 'externalCustomerId';

	/**
	 * Поиск контактов.
	 *
	 * @param int $offset
	 * @return \Psr\Http\Message\StreamInterface
	 */
	public function all($offset = 1)
	{
		return $this->get('contacts/', ['startindex' => $offset]);
	}

	public function search($query, $parameters = [])
	{
		return $this->get('contacts/', $query, $parameters);
	}

	/**
	 * @param array $contacts
	 * @param $dedupeOn
	 * @param array $contactFields
	 * @param array $customFieldsIDs
	 * @param array $groupNames
	 * @param bool $restoreDeleted
	 * @return \Psr\Http\Message\StreamInterface
	 */
	public function update(array $contacts, $dedupeOn, array $contactFields, array $customFieldsIDs, array $groupNames,
	                       $restoreDeleted = FALSE)
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
	 * @param array $ids
	 * @return \Psr\Http\Message\StreamInterface
	 */
	public function getEmail(array $ids)
	{
		return $this->get('contacts/email', [
			'emails' => implode(',', $ids)
		]);
	}
}

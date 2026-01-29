<?php

namespace Esputnik\Api;

use Esputnik\Exception\ErrorException;
use Esputnik\Model\Contact as ContactModel;
use Esputnik\Model\Field;
use Esputnik\Model\Group;
use GuzzleHttp\Exception\GuzzleException;

class Contact extends AbstractApi
{
	/**
	 * Добавить контакт. Поле id будет проигнорировано.
	 *
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function add(ContactModel $contact)
	{
		return $this->post('contact/', $contact);
	}

	/**
	 * Обновить контакт. Поле id контакта будет проигнорировано.
	 *
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function update($id, ContactModel $contact)
	{
		return $this->put('contact/' . rawurlencode($id), $contact);
	}

	/**
	 * Удалить контакт.
	 *
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function remove($id)
	{
		return $this->delete('contact/' . rawurlencode($id));
	}

	/**
	 * Получить контакт.
	 *
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function show($id)
	{
		return $this->get('contact/' . rawurlencode($id));
	}

	/**
	 * Подписать контакт. Используется для интеграции форм подписки.
	 * Если контакт не существует - будет создан с неподтверждённым email-ом.
	 * Если контакт существует - будет обновлен.
	 *
	 * @param Group[] $groups
	 * @param Field[] $fields
	 * @param bool $dedupeOn
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function subscribe(ContactModel $contact, array $groups, array $fields, $dedupeOn, string $formType)
	{
		return $this->post('contact/subscribe/', [
			'contact'  => $contact,
			'groups'   => array_map(function (Group $group) {
				return $group->getName();
			}, $groups),
			'fields'   => $fields,
			'dedupeOn' => $dedupeOn,
			'formType' => $formType,
		]);
	}

	/**
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function activity(
		?\DateTime $dateFrom = NULL,
		?\DateTime $dateTo = NULL,
		?string    $email = NULL,
		?string    $sms = NULL,
		?string    $messageTag = NULL,
		?string    $activityStatus = NULL,
		array      $parameters = [])
	{
		$query = [];
		if ($dateFrom) {
			$query['dateFrom'] = $dateFrom->format('Y-m-d');
		}

		if ($dateTo) {
			$query['dateTo'] = $dateTo->format('Y-m-d');
		}

		if ($email) {
			$query['email'] = $email;
		}

		if ($sms) {
			$query['sms'] = $sms;
		}

		if ($messageTag) {
			$query['messageTag'] = $messageTag;
		}

		if ($activityStatus) {
			$query['activityStatus'] = $activityStatus;
		}

		return $this->get('contactActivity/', $query, $parameters);
	}
}

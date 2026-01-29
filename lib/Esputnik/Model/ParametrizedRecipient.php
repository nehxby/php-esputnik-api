<?php

namespace Esputnik\Model;

class ParametrizedRecipient extends AbstractModel
{
	protected int $contactId;
	protected string $email;
	protected ?string $jsonParam;
	protected string $locator;

	/**
	 * @param MessageParam[] $params
	 */
	public function __construct(Contact $contact, string $email, array $params, string $locator)
	{
		$this->jsonParam = json_encode($params) ?: NULL;

		$this->contactId = $contact->getId();
		$this->email = $email;
		$this->locator = $locator;
	}

	public function getContactId(): int
	{
		return $this->contactId;
	}

	public function getEmail(): string
	{
		return $this->email;
	}

	public function getJsonParam(): ?string
	{
		return $this->jsonParam;
	}

	public function getLocator(): string
	{
		return $this->locator;
	}
}

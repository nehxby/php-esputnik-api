<?php

namespace Esputnik\Model;

class Contact extends AbstractModel
{
	protected ?int $id = NULL;
	protected string $firstName;
	protected ?string $lastName = NULL;
	protected array $channels = [];
	protected ?Address $address = NULL;
	/**
	 * @var Field[] $fields
	 */
	protected array $fields = [];
	protected ?int $addressBookId = NULL;
	protected ?string $contactKey;
	protected $ordersInfo;
	/**
	 * @var Group[] $groups
	 */
	protected array $groups = [];
	protected string|int $externalCustomerId;

	/**
	 * @param array $groups elements should be Group instances
	 * @param array $channels elements should be Channel instances
	 */
	public function __construct(string $firstName, array $groups, array $channels)
	{
		$this->firstName = $firstName;
		$this->groups = array_filter($groups, fn($group) => $group instanceof Group);
		$this->channels = array_filter($channels, fn($channel) => $channel instanceof Channel);
	}


	public function getId(): ?int
	{
		return $this->id;
	}

	public function getFirstName(): string
	{
		return $this->firstName;
	}

	public function setFirstName(string $firstName): void
	{
		$this->firstName = $firstName;
	}

	public function getLastName(): ?string
	{
		return $this->lastName;
	}

	public function setLastName(string $lastName): void
	{
		$this->lastName = $lastName;
	}

	public function getChannels(): array
	{
		return $this->channels;
	}

	public function getAddress(): ?Address
	{
		return $this->address;
	}

	/**
	 * @return $this
	 */
	public function setAddress(Address $address): static
	{
		$this->address = $address;
		return $this;
	}

	/**
	 * @return Field[]
	 */
	public function getFields(): array
	{
		return $this->fields;
	}

	public function addField(Field $field): void
	{
		$this->fields[] = $field;
	}

	public function getAddressBookId(): ?int
	{
		return $this->addressBookId;
	}

	public function setAddressBookId(int $addressBookId): void
	{
		$this->addressBookId = $addressBookId;
	}

	public function getContactKey(): ?string
	{
		return $this->contactKey;
	}

	public function setContactKey(string $contactKey): void
	{
		$this->contactKey = $contactKey;
	}

	public function getOrdersInfo()
	{
		return $this->ordersInfo;
	}

	public function setOrdersInfo($ordersInfo): void
	{
		$this->ordersInfo = $ordersInfo;
	}

	/**
	 * @return Group[]
	 */
	public function getGroups(): array
	{
		return $this->groups;
	}

	public function setExternalCustomerId(int|string $externalCustomerId): void
	{
		$this->externalCustomerId = $externalCustomerId;
	}

	public function getExternalCustomerId(): int|string
	{
		return $this->externalCustomerId;
	}
}

<?php

namespace Esputnik\Model;

use Esputnik\Exception\InvalidModelException;

class Group extends AbstractModel
{
	public const string GROUP_TYPE_STATIC = 'Static';
	public const string GROUP_TYPE_DYNAMIC = 'Dynamic';
	public const string GROUP_TYPE_COMBINED = 'Combined';

	protected ?int $id = NULL;
	protected string $name;
	protected string $type;

	private array $types = [
		self::GROUP_TYPE_STATIC,
		self::GROUP_TYPE_DYNAMIC,
		self::GROUP_TYPE_COMBINED,
	];

	/**
	 * @throws InvalidModelException
	 */
	public function __construct(string $type, string $name)
	{
		if (!in_array($type, $this->types)) {
			throw new InvalidModelException('Invalid group type: ' . $type);
		}
		$this->name = $name;
		$this->type = $type;
	}

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function getType(): string
	{
		return $this->type;
	}
}

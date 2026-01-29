<?php

namespace Esputnik\Model;

class Address extends AbstractModel
{
	protected ?string $region = NULL;
	protected ?string $town = NULL;
	protected ?string $address = NULL;
	protected ?string $postcode = NULL;

	public function getRegion(): ?string
	{
		return $this->region;
	}

	public function setRegion(string $region): void
	{
		$this->region = $region;
	}

	public function getTown(): ?string
	{
		return $this->town;
	}

	public function setTown(string $town): void
	{
		$this->town = $town;
	}

	public function getAddress(): ?string
	{
		return $this->address;
	}

	public function setAddress(string $address): void
	{
		$this->address = $address;
	}

	public function getPostcode(): ?string
	{
		return $this->postcode;
	}

	public function setPostcode(string $postcode): void
	{
		$this->postcode = $postcode;
	}
}

<?php

namespace Esputnik\Model;

class EmailMessage extends AbstractModel
{
	protected int $id;

	protected string $name;

	protected string $from;

	protected string $subject;

	protected string $htmlText;

	/**
	 * @var string[]
	 */
	protected array $tags = [];

	/**
	 * @param string[] $tags
	 */
	public function __construct(string $name, string $from, string $subject, string $htmlText, array $tags = [])
	{
		$this->name = $name;
		$this->from = $from;
		$this->subject = $subject;
		$this->htmlText = $htmlText;
		$this->tags = $tags;
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function getFrom(): string
	{
		return $this->from;
	}

	public function getSubject(): string
	{
		return $this->subject;
	}

	public function getHtmlText(): string
	{
		return $this->htmlText;
	}

	/**
	 * @return string[]
	 */
	public function getTags(): array
	{
		return $this->tags;
	}
}

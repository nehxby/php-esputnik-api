<?php

namespace Esputnik\Model;

class Event extends AbstractModel
{
	/**
	 * Идентификатор-ключ типа события. Если в системе нет типа события с таким ключем, то он создается
	 * @var string
	 */
	protected string $eventTypeKey;

	/**
	 * Идентификатор события. Может совпадать с идентификтором или email-ом контакта.
	 * Повторные события определенного типа с одинаковым идентификатором будут проигнорированы
	 *
	 * @var string
	 */
	protected string $keyValue;

	/**
	 * @var EventParam[]
	 */
	protected array $params;

	/**
	 * Event constructor.
	 * @param array $params elements should be EventParam instances
	 */
	public function __construct(string $eventTypeKey, string $keyValue, array $params = [])
	{
		$this->eventTypeKey = $eventTypeKey;
		$this->keyValue = $keyValue;
		$this->params = array_filter($params, fn($param) => $param instanceof EventParam);
	}

	public function addParam(string $name, string $value): static
	{
		$this->params[] = new EventParam($name, $value);
		return $this;
	}

	public function getEventTypeKey(): string
	{
		return $this->eventTypeKey;
	}

	public function getKeyValue(): string
	{
		return $this->keyValue;
	}

	/**
	 * @return EventParam[]
	 */
	public function getParams(): array
	{
		return $this->params;
	}
}

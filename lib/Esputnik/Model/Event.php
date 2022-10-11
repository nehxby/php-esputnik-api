<?php

namespace Esputnik\Model;

class Event extends AbstractModel
{
    /**
     * Идентификатор-ключ типа события. Если в системе нет типа события с таким ключем, то он создается
     * @var string
     */
    protected $eventTypeKey;

    /**
     * Идентификатор события. Может совпадать с идентификтором или email-ом контакта.
     * Повторные события определенного типа с одинаковым идентификатором будут проигнорированы
     *
     * @var string
     */
	protected $keyValue;

    /**
     * @var EventParam[]
     */
	protected $params;

    /**
     * Event constructor.
     * @param string       $eventTypeKey
     * @param string       $keyValue
     * @param EventParam[] $params
     */
    public function __construct($eventTypeKey, $keyValue, array $params = [])
    {
        $this->eventTypeKey = $eventTypeKey;
        $this->keyValue = $keyValue;
	    $this->params = array_filter($params, function ($group) {
		    return $group instanceof EventParam;

	    });
    }

	public function addParam($name, $value)
	{
		$this->params[] = new EventParam($name, $value);
		return $this;
	}

    /**
     * @return string
     */
    public function getEventTypeKey()
    {
        return $this->eventTypeKey;
    }

    /**
     * @return string
     */
    public function getKeyValue()
    {
        return $this->keyValue;
    }

    /**
     * @return EventParam[]
     */
    public function getParams()
    {
        return $this->params;
    }
}

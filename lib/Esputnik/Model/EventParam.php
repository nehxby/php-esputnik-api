<?php

namespace Esputnik\Model;

class EventParam extends AbstractModel
{
	/**
	 * @var string
	 */
	protected $name;

	/**
     * @var string
     */
	protected $value;

    /**
     * EventParam constructor.
     * @param string $value
     * @param string $name
     */
    public function __construct($name, $value)
    {
	    $this->name = $name;
	    $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

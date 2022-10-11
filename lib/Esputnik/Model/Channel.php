<?php

namespace Esputnik\Model;

class Channel extends AbstractModel
{
    const TYPE_EMAIL = 'email';
    const TYPE_SMS = 'sms';

    protected $type;
	protected $value;

    /**
     * Channel constructor.
     * @param $type
     * @param $value
     */
    public function __construct($type, $value)
    {
        $this->type = $type;
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}

<?php

namespace Esputnik\Model;

class ParametrizedRecipient extends AbstractModel
{
	protected $contactId;
	protected $email;
	protected $jsonParam;
	protected $locator;

    /**
     * ParametrizedRecipient constructor.
     * @param Contact        $contact
     * @param string         $email
     * @param MessageParam[] $params
     * @param string         $locator
     */
    public function __construct(Contact $contact, $email, array $params, $locator)
    {
	    $this->jsonParam = json_encode($params);

	    $this->contactId = $contact->getId();
        $this->email = $email;
        $this->locator = $locator;
    }

    /**
     * @return int
     */
    public function getContactId()
    {
        return $this->contactId;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed|string
     */
    public function getJsonParam()
    {
        return $this->jsonParam;
    }

    /**
     * @return string
     */
    public function getLocator()
    {
        return $this->locator;
    }
}

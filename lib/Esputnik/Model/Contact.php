<?php

namespace Esputnik\Model;

class Contact extends AbstractModel
{
	protected $id;
	protected $firstName;
	protected $lastName;
	protected $channels = [];
	protected $address;
	protected $fields = [];
	protected $addressBookId;
	protected $contactKey;
	protected $ordersInfo;
	protected $groups = [];
	protected $externalCustomerId;

    /**
     * Contact constructor.
     * @param $firstName
     * @param array     $groups
     * @param array     $channels
     */
    public function __construct($firstName, array $groups, array $channels)
    {
        $this->firstName = $firstName;
        $this->groups = array_filter($groups, function ($group) {
            return $group instanceof Group;

        });
        $this->channels = array_filter($channels, function ($channel) {
            return $channel instanceof Channel;

        });
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return array
     */
    public function getChannels()
    {
        return $this->channels;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return $this
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param Field $fields
     */
    public function addField(Field $fields)
    {
        $this->fields[] = $fields;
    }

    /**
     * @return mixed
     */
    public function getAddressBookId()
    {
        return $this->addressBookId;
    }

    /**
     * @param mixed $addressBookId
     */
    public function setAddressBookId($addressBookId)
    {
        $this->addressBookId = $addressBookId;
    }

    /**
     * @return mixed
     */
    public function getContactKey()
    {
        return $this->contactKey;
    }

    /**
     * @param mixed $contactKey
     */
    public function setContactKey($contactKey)
    {
        $this->contactKey = $contactKey;
    }

    /**
     * @return mixed
     */
    public function getOrdersInfo()
    {
        return $this->ordersInfo;
    }

    /**
     * @param mixed $ordersInfo
     */
    public function setOrdersInfo($ordersInfo)
    {
        $this->ordersInfo = $ordersInfo;
    }

    /**
     * @return array
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param mixed $externalCustomerId
     */
    public function setExternalCustomerId($externalCustomerId)
    {
        $this->externalCustomerId = $externalCustomerId;
    }

    /**
     * @return array
     */
    public function getExternalCustomerId()
    {
        return $this->externalCustomerId;
    }
}

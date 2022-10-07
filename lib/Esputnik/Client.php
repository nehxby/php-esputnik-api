<?php

namespace Esputnik;

use Esputnik\Api\AddressBooks;
use Esputnik\Api\Balance;
use Esputnik\Api\Callouts;
use Esputnik\Api\Contact;
use Esputnik\Api\Contacts;
use Esputnik\Api\Event;
use Esputnik\Api\Group;
use Esputnik\Api\Groups;
use Esputnik\Exception\InvalidArgumentException;
use Esputnik\HttpClient\HttpClient;

class Client
{
	const API_BALANCE = 'balance';
	const API_CONTACTS = 'contacts';
	const API_CONTACT = 'contact';
	const API_CALLOUTS = 'callouts';
	const API_CALLOUT = 'callout';
	const API_ADDRESSBOOK = 'addressbook';
	const API_ADDRESSBOOKS = 'addressbooks';
	const API_GROUP = 'group';
	const API_GROUPS = 'groups';
	const API_EVENT = 'event';

	protected $options = [
        'base_url' => 'https://esputnik.com/api/',
        'api_version' => 'v1',
        'user_agent' => 'php-esputnik-api (http://)',
        'cache_dir' => null,
        'content_type' => 'application/json; charset=UTF-8',
    ];

    private $httpClient;

    public function __construct($httpClient = null)
    {
        $this->httpClient = $httpClient;
    }

    public function api($name)
    {
        switch ($name) {
            case self::API_BALANCE:
                $api = new Balance($this);
                break;
            case self::API_CONTACTS:
                $api = new Contacts($this);
                break;
            case self::API_CONTACT:
                $api = new Contact($this);
                break;
            case self::API_CALLOUTS:
            case self::API_CALLOUT:
                $api = new Callouts($this);
                break;
            case self::API_ADDRESSBOOK:
            case self::API_ADDRESSBOOKS:
                $api = new AddressBooks($this);
                break;
            case self::API_GROUP:
                $api = new Group($this);
                break;
            case self::API_GROUPS:
                $api = new Groups($this);
                break;
            case self::API_EVENT:
                $api = new Event($this);
                break;
            default:
                throw new InvalidArgumentException(sprintf('Undefined api instance called: "%s"', $name));
        }

        return $api;
    }

    public function authenticate($login, $password)
    {
        $this->options['login'] = $login;
        $this->options['password'] = $password;
    }

    public function getHttpClient()
    {
        if (null === $this->httpClient) {
            $this->httpClient = new HttpClient($this->options);
        }

        return $this->httpClient;
    }
}

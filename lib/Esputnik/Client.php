<?php

namespace Esputnik;

use Esputnik\Api\AbstractApi;
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
	public const string API_BALANCE = 'balance';
	public const string API_CONTACTS = 'contacts';
	public const string API_CONTACT = 'contact';
	public const string API_CALLOUTS = 'callouts';
	public const string API_CALLOUT = 'callout';
	public const string API_ADDRESSBOOK = 'addressbook';
	public const string API_ADDRESSBOOKS = 'addressbooks';
	public const string API_GROUP = 'group';
	public const string API_GROUPS = 'groups';
	public const string API_EVENT = 'event';

	protected array $options = [
		'base_url'     => 'https://esputnik.com/api/',
		'api_version'  => 'v1',
		'user_agent'   => 'php-esputnik-api (http://)',
		'cache_dir'    => NULL,
		'content_type' => 'application/json; charset=UTF-8',
	];

	private ?HttpClient $httpClient;

	public function __construct(?HttpClient $httpClient = NULL)
	{
		$this->httpClient = $httpClient;
	}

	public function api($name): AbstractApi
	{
		return match ($name) {
			self::API_BALANCE => new Balance($this),
			self::API_CONTACTS => new Contacts($this),
			self::API_CONTACT => new Contact($this),
			self::API_CALLOUTS, self::API_CALLOUT => new Callouts($this),
			self::API_ADDRESSBOOK, self::API_ADDRESSBOOKS => new AddressBooks($this),
			self::API_GROUP => new Group($this),
			self::API_GROUPS => new Groups($this),
			self::API_EVENT => new Event($this),
			default => throw new InvalidArgumentException(sprintf('Undefined api instance called: "%s"', $name)),
		};
	}

	public function authenticate($login, $password): void
	{
		$this->options['login'] = $login;
		$this->options['password'] = $password;
	}

	public function getHttpClient(): HttpClient
	{
		if (NULL === $this->httpClient) {
			$this->httpClient = new HttpClient($this->options);
		}

		return $this->httpClient;
	}
}

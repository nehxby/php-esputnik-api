<?php

namespace Esputnik\HttpClient;

use Esputnik\Exception\ErrorException;
use Esputnik\Exception\RuntimeException;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class HttpClient
{
	protected array $options = [
		'api_version'  => 'v1',
		'user_agent'   => 'php-esputnik-api (http://)',
		'cache_dir'    => NULL,
		'content_type' => 'application/json; charset=UTF-8',
	];

	protected array $headers = [];
	protected ?Request $lastRequest = NULL;
	protected ?Response $lastResponse = NULL;

	protected ClientInterface|GuzzleClient $client;

	/**
	 * @param array $options
	 * @param ClientInterface|null $client
	 */
	public function __construct(array $options = [], ?ClientInterface $client = NULL)
	{
		$this->clearHeaders();

		$this->options = array_merge($this->options, $options);
		$client = $client ?: new GuzzleClient([
			'base_uri' => sprintf('%s%s/', $this->options['base_url'], $this->options['api_version']),
			'auth'     => [$this->options['login'], $this->options['password']],
			'headers'  => $this->headers,
		]);

		$this->client = $client;
	}

	public function setOption($name, $value): void
	{
		$this->options[$name] = $value;
	}

	public function setHeaders(array $headers): void
	{
		$this->headers = array_merge($this->headers, $headers);
	}

	/**
	 * Clears used headers.
	 */
	public function clearHeaders(): void
	{
		$this->headers = [
			'Accept'       => 'application/json',
			'User-Agent'   => sprintf('%s', $this->options['user_agent']),
			'Content-Type' => sprintf('%s', $this->options['content_type']),
		];
	}


	/**
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function get($path, array $query = [], $parameters = []): Response
	{
		$this->options['query'] = $query;

		if (isset($parameters['maxrows'])) {
			$this->options['query']['maxrows'] = $parameters['maxrows'];
		}

		if (isset($parameters['startindex'])) {
			$this->options['query']['startindex'] = $parameters['startindex'];
		}

		return $this->request($path, NULL, 'GET');
	}

	/**
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function post($path, $body = NULL): Response
	{
		return $this->request($path, $body, 'POST');
	}

	/**
	 * @throws GuzzleException
	 * @throws ErrorException
	 */
	public function patch($path, $body = NULL): Response
	{
		return $this->request($path, $body, 'PATCH');
	}

	/**
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function delete($path, $body = NULL): Response
	{
		return $this->request($path, $body, 'DELETE');
	}

	/**
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	public function put($path, $body): Response
	{
		return $this->request($path, $body, 'PUT');
	}

	/**
	 * @throws GuzzleException
	 * @throws ErrorException
	 */
	public function request($path, $body = NULL, $httpMethod = 'GET', array $headers = []): Response
	{
		$request = $this->createRequest($httpMethod, $path, $body, $headers);

		try {
			/**
			 * @var Response $response
			 */
			$response = $this->client->send($request, $this->options);
		} catch (\LogicException $e) {
			throw new ErrorException($e->getMessage(), $e->getCode(), 1, NULL, NULL, $e);
		} catch (\RuntimeException $e) {
			throw new RuntimeException($e->getMessage(), $e->getCode(), $e);
		}

		$this->lastRequest = $request;
		$this->lastResponse = $response;

		return $response;
	}

	public function getLastRequest(): ?Request
	{
		return $this->lastRequest;
	}

	public function getLastResponse(): ?Response
	{
		return $this->lastResponse;
	}

	protected function createRequest($httpMethod, $path, $body = NULL, array $headers = []): Request
	{
		return new Request(
			$httpMethod,
			$path,
			$headers,
			$body
		);
	}
}

<?php

namespace Esputnik\Api;

use Esputnik\Client;
use Esputnik\Exception\ErrorException;
use Esputnik\HttpClient\Message\ResponseMediator;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;

abstract class AbstractApi
{
	protected Client $client;

	/**
	 * @param Client $client
	 */
	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	/**
	 * Send a GET request with query parameters.
	 *
	 * @param string $path Request path.
	 * @param array $query GET parameters.
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	protected function get(string $path, array $query = [], array $parameters = [])
	{
		$response = $this->client->getHttpClient()
			->get($path, $query, $parameters);

		return ResponseMediator::getContent($response);
	}

	/**
	 * Send a HEAD request with query parameters.
	 *
	 * @param string $path Request path.
	 * @param array $parameters HEAD parameters.
	 * @param array $requestHeaders Request headers.
	 *
	 * @return Response
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	protected function head(string $path, array $parameters = [], array $requestHeaders = []): Response
	{
		return $this->client->getHttpClient()
			->request($path, NULL, 'HEAD', $requestHeaders);
	}

	/**
	 * Send a POST request with JSON-encoded parameters.
	 *
	 * @param string $path Request path.
	 * @param array|\JsonSerializable $parameters POST parameters to be JSON encoded
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	protected function post(string $path, array|\JsonSerializable $parameters = [])
	{
		return $this->postRaw(
			$path,
			$this->createJsonBody($parameters)
		);
	}

	/**
	 * Send a POST request with raw data.
	 *
	 * @param string $path Request path.
	 * @param mixed $body array body.
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	protected function postRaw(string $path, mixed $body)
	{
		$response = $this->client->getHttpClient()->post($path, $body);

		return ResponseMediator::getContent($response);
	}

	/**
	 * Send a PATCH request with JSON-encoded parameters.
	 *
	 * @param string $path Request path.
	 * @param array $parameters POST parameters to be JSON encoded
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	protected function patch(string $path, array $parameters = [])
	{
		$response = $this->client->getHttpClient()->patch(
			$path,
			$this->createJsonBody($parameters)
		);

		return ResponseMediator::getContent($response);
	}

	/**
	 * Send a PUT request with JSON-encoded parameters.
	 *
	 * @param string $path Request path.
	 * @param array|\JsonSerializable $parameters POST parameters to be JSON encoded.
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	protected function put(string $path, array|\JsonSerializable $parameters = [])
	{
		$response = $this->client->getHttpClient()->put(
			$path,
			$this->createJsonBody($parameters)
		);

		return ResponseMediator::getContent($response);
	}

	/**
	 * Send a DELETE request with JSON-encoded parameters.
	 *
	 * @param string $path Request path.
	 * @param array $parameters POST parameters to be JSON encoded.
	 * @throws ErrorException
	 * @throws GuzzleException
	 */
	protected function delete(string $path, array $parameters = [])
	{
		$response = $this->client->getHttpClient()->delete(
			$path,
			$this->createJsonBody($parameters)
		);

		return ResponseMediator::getContent($response);
	}

	/**
	 * Create a JSON encoded version of an array of parameters.
	 */
	protected function createJsonBody($parameters): ?string
	{
		return json_encode($parameters) ?: NULL;
	}
}

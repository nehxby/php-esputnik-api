<?php

namespace Esputnik\HttpClient\Message;

use GuzzleHttp\Psr7\Response;

class ResponseMediator
{
	public static function getContent(Response $response)
	{
		$contentType = $response->getHeader('Content-Type');

		$body = $response->getBody();
		if ($contentType and str_starts_with($contentType[0], 'application/json')) {
			$content = json_decode($body, TRUE);
			if (JSON_ERROR_NONE === json_last_error()) {
				return $content;
			}
		}

		return (string)$body;
	}
}

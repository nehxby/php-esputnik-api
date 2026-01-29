<?php

namespace Esputnik\Exception;

/**
 * MissingArgumentException.
 *
 * @author Joseph Bielawski <stloyd@gmail.com>
 */
class MissingArgumentException extends ErrorException
{
	public function __construct(array $required, $code = 0, $previous = NULL)
	{
		$format = 'One or more of required ("%s") parameters is missing!';
		parent::__construct(sprintf($format, implode('", "', $required)), $code, $previous);
	}
}

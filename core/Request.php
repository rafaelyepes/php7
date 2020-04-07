<?php

class Request
{
	public static function uri()
	{
		$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

		return $uri;
	}

}	
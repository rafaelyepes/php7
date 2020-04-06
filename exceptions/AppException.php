<?php

class AppException extends Exception
{

	/**
	 * Class Constructor
	 */
	public function __construct(string $message)
	{
		parent::__construct($message);
	}




}

?>
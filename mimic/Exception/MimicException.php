<?php
/**
 * Exception
 */

namespace Mimic\Exception;

use Exception;

class MimicException extends Exception
{
	// TODO: exception handle ['render', 'log']
	public function handle()
	{
		echo $this->getMessage();
		exit;
	}
}
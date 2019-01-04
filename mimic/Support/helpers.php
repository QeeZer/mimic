<?php
/**
 * supports
 */

use Illuminate\Container\Container;
use Mimic\Exception\MimicException;

if (!function_exists('mimic')) {
	/**
	 * 获得 mimic 实例
	 *
	 * @param  string $abstract
	 * @param  array $parameters
	 * @return mixed|\Mimic\Brain
	 */
	function mimic($abstract = null, array $parameters = [])
	{
		if (is_null($abstract)) {
			return Container::getInstance();
		}

		return Container::getInstance()->make($abstract, $parameters);
	}
}

if (!function_exists('qz_e')) {
	/**
	 * 抛出异常
	 * @param $error
	 * @throws MimicException
	 */
	function qz_e($error)
	{
		throw new MimicException($error);
	}
}
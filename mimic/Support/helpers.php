<?php
/**
 * supports
 */

use Illuminate\Container\Container;

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
	// todo 捕获异常
	function qz_e($error)
	{
		echo $error;
		exit;
	}
}
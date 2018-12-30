<?php
/**
 * Mimic's Brain Contract
 */

namespace Mimic\Contract;

use Illuminate\Contracts\Container\Container;

interface Brain extends Container
{
	/**
	 * 获取 Mimic 版本
	 * @return string
	 */
	public function version();

	/**
	 * 获取 Mimic 运行目录
	 * @return string
	 */
	public function basePath();

	/**
	 * Mimic Brain 启动
	 * @return void
	 */
	public function wakeUp();

	/**
	 * Mimic Brain 启动回调
	 * @param mixed $callback
	 * @return void
	 */
	public function awaking($callback);

	/**
	 * Mimic Brain 启动后回调
	 * @param mixed $callback
	 * @return void
	 */
	public function wokeUp($callback);

	/**
	 * Mimic Brain 休息
	 * @return bool
	 */
	public function sleep();


	/**
	 * 在控制台中运行
	 * @return bool
	 */
	public function runningInConsole();

	/**
	 * 在 Mimic 中运行
	 * @return bool
	 */
	public function runningInMimic();

	/**
	 * 获得当前运行环境
	 * @return string
	 */
	public function environment();
}
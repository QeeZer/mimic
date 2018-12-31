<?php
/**
 * 插件
 */

namespace Mimic\Contract\Plugin;

interface Plugin
{
	/**
	 * 事件执行
	 * @return void
	 */
	public function handle();
}
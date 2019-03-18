<?php
/**
 * View
 */

namespace Mimic\Contract\View;

interface View
{
	/**
	 * 全局设置
	 * @return mixed
	 */
	public function globalSet();

	/**
	 * 渲染
	 * @return mixed
	 */
	public function render();
}
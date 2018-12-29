<?php
/**
 * Mimic Sleep Contract
 */

namespace Mimic\Contracts\Support;

interface Sleep
{
	/**
	 * 结束后台进程
	 * @return void
	 */
	public function killBackgroundProcess();

	/**
	 * 全局通告暂停
	 * @return void
	 */
	public function showGlobalBulletin();
}
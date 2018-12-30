<?php
/**
 * Mimic Sleep
 */

namespace Mimic\Support;

use Mimic\Contract\Support\Sleep as SleepContract;

class Sleep implements SleepContract
{
	/**
	 * 结束后台进程
	 * @return void
	 */
	public function killBackgroundProcess()
	{
		// todo: killBackgroundProcess
	}

	/**
	 * 全局通告暂停
	 * @return void
	 */
	public function showGlobalBulletin()
	{
		// todo: showGlobalBulletin
	}
}
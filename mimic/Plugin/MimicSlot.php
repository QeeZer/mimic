<?php
/**
 * Mimic slot
 */

namespace Mimic\Plugin;

use Mimic\Contract\Plugin\MimicSlot as MimicSlotContract;

class MimicSlot implements MimicSlotContract
{
	protected static $instance = null;

	/**
	 * 挂载插件
	 * @param $plugin
	 * @return bool
	 */
	public function mount($plugin)
	{
		//
	}

	/**
	 * 卸载插件
	 * @param $plugin
	 * @return mixed
	 */
	public function unmount($plugin)
	{
		//
	}

	/**
	 * 激活所有插件
	 * @return void
	 */
	public function run()
	{
		//
	}

	public static function getInstance()
	{
		if (is_null(static::$instance)) {
			static::$instance = new static;
		}

		return static::$instance;
	}

	public static function setInstance(MimicSlotContract $slot = null)
	{
		return static::$instance = $slot;
	}
}
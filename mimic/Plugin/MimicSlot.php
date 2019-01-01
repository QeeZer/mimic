<?php
/**
 * Mimic slot
 */

namespace Mimic\Plugin;

use Mimic\Contract\Plugin\MimicSlot as MimicSlotContract;

class MimicSlot implements MimicSlotContract
{
	/** @var null MimicSlot */
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
	 * 获取插件列表
	 * @return void
	 */
	public function getPluginsList()
	{
	}

	/**
	 * 获取已激活插件列表
	 * @return mixed
	 */
	public function getActivePluginsList()
	{
	}

	/**
	 * 获取插件详情
	 * @param $plugin
	 * @return mixed
	 */
	public function getPluginInfo($plugin)
	{
	}

	/**
	 * 激活所有插件
	 * @return void
	 */
	public function run()
	{
		//
	}

	/**
	 * 获取自身单例
	 *
	 * @return self|null
	 */
	public static function getInstance()
	{
		if (is_null(static::$instance)) {
			static::$instance = new static;
		}

		return static::$instance;
	}

	/**
	 * 设置实例
	 *
	 * @param MimicSlotContract|null $slot
	 * @return MimicSlotContract
	 */
	public static function setInstance(MimicSlotContract $slot = null)
	{
		return static::$instance = $slot;
	}
}
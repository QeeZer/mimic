<?php
/**
 * PluginInterface
 */

namespace Mimic\Contract\Plugin;

interface MimicSlot
{
	/**
	 * 挂载插件
	 * @param $plugin
	 * @return bool
	 */
	public function mount($plugin);

	/**
	 * 卸载插件
	 * @param $plugin
	 * @return mixed
	 */
	public function unmount($plugin);

	/**
	 * 获取插件列表
	 * @return void
	 */
	public function getPluginsList();

	/**
	 * 获取已激活插件列表
	 * @return mixed
	 */
	public function getActivePluginsList();

	/**
	 * 获取插件详情
	 * @param $plugin
	 * @return mixed
	 */
	public function getPluginInfo($plugin);
}
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
	 * 激活所有插件
	 * @return void
	 */
	public function run();
}
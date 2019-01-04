<?php
/**
 * Mimic slot
 */

namespace Mimic\Plugin;

use Mimic\Contract\Plugin\MimicSlot as MimicSlotContract;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

class MimicSlot implements MimicSlotContract
{
	/** @var null MimicSlot */
	protected static $instance = null;

	/** @var array plugins */
	protected static $plugins = [];

	/** @var string $plugins directory */
	protected $pluginsDirectory = ROOT_DIR . 'plugins/';

	/** @var string $manager file */
	protected $managerFile = ROOT_DIR . 'plugins/manager.yaml';

	/**
	 * 挂载插件
	 * @param $plugin
	 * @return void
	 * @throws \Mimic\Exception\MimicException
	 */
	public function mount($plugin)
	{
		$plugins = $this->getPluginsList();

		if (isset($plugins[$plugin])) {
			qz_e('该插件已激活');
		}

		$plugins[$plugin] = 1;

		file_put_contents($this->managerFile, Yaml::dump($plugins));
	}

	/**
	 * 卸载插件
	 * @param $plugin
	 * @return mixed
	 * @throws \Mimic\Exception\MimicException
	 */
	public function unmount($plugin)
	{
		$plugins = $this->getPluginsList();

		if (!isset($plugins[$plugin])) {
			qz_e('没有该插件！');
		}

		$plugins[$plugin] = 0;

		file_put_contents($this->managerFile, Yaml::dump($plugins));
	}

	/**
	 * 获取插件列表
	 * @return void
	 * @throws \Mimic\Exception\MimicException
	 */
	public function getPluginsList()
	{
		try {
			return Yaml::parseFile($this->managerFile);
		} catch (ParseException $exception) {
			qz_e($exception->getMessage());
		}
	}

	/**
	 * 获取已激活插件列表
	 * @return mixed
	 * @throws \Mimic\Exception\MimicException
	 */
	public function getActivePluginsList()
	{
		$plugins = $this->getPluginsList();

		return array_where($plugins, function ($value, $key) {
			return $value == true;
		});
	}

	/**
	 * 获取插件详情
	 * @param $plugin
	 * @return mixed
	 * @throws \Mimic\Exception\MimicException
	 */
	public function getPluginInfo($plugin)
	{
		try {
			return Yaml::parseFile($this->pluginsDirectory . $plugin . '/info.yaml');
		} catch (ParseException $exception) {
			qz_e($exception->getMessage());
		}
	}

	/**
	 * 激活所有插件
	 * @return void
	 * @throws \Mimic\Exception\MimicException
	 */
	public function run()
	{
		$plugins = $this->getActivePluginsList();

		foreach ($plugins as $key => $value) {
			$file = $this->pluginsDirectory . $key . '/include.php';

			if (!file_exists($file)) {
				qz_e($file . '文件不存在');
			}

			include $file;
		}
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
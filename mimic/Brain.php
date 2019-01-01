<?php
/**
 * Brain
 */

namespace Mimic;

use Closure;
use Illuminate\Container\Container;
use Mimic\Contract\Brain as BrainContract;
use Mimic\Plugin\Hook;

class Brain extends Container implements BrainContract
{
	/** @var string Mimic 版本 */
	const MIMIC_VERSION = 'v1.0.x-dev';

	/** @var null Mimic 运行目录 */
	protected $bathPath = null;

	/**
	 * Brain constructor.
	 * @param string $bathPath
	 */
	public function __construct($bathPath = ROOT_DIR)
	{
		$this->bathPath = $bathPath;

		$this->registerSystem();

		$this->registerCoreContainerAliases();
	}

	/**
	 * 注册系统基础项
	 */
	public function registerSystem()
	{
		/** 单例化 mimic */
		static::setInstance($this);

		/** 将 mimic 绑定至 Brain::brain */
		$this->instance('brain', $this);

		/** 绑定自身 */
		$this->instance(Container::class, $this);

		/** @var 绑定必须单例项 $item */
		foreach ([
			         \Mimic\Plugin\Hook::class,
			         \Mimic\Plugin\MimicSlot::class
		         ] as $item) {
			$this->instance($item, $item::getInstance());
		}
	}

	/**
	 * 绑定核心容器别名
	 */
	public function registerCoreContainerAliases()
	{
		foreach ([
			         'brain' => [\Mimic\Brain::class, \Illuminate\Contracts\Container\Container::class, \Mimic\Contract\Brain::class, \Psr\Container\ContainerInterface::class],
		         ] as $key => $aliases) {
			foreach ($aliases as $alias) {
				$this->alias($key, $alias);
			}
		}
	}

	/**
	 * 获取 Mimic 版本
	 * @return string
	 */
	public function version()
	{
		return static::VERSION;
	}

	/**
	 * 获取 Mimic 运行目录
	 * @return string
	 */
	public function basePath()
	{
		return $this->bathPath;
	}

	/**
	 * Mimic Brain 启动
	 * @return void
	 */
	public function wakeUp()
	{
		//
	}

	/**
	 * Mimic Brain 启动回调
	 * @param mixed $callback
	 * @return void
	 */
	public function awaking($callback)
	{
		//
	}

	/**
	 * Mimic Brain 启动后回调
	 * @param mixed $callback
	 * @return void
	 */
	public function wokeUp($callback)
	{
		//
	}

	/**
	 * Mimic Brain 休息
	 * @return void
	 */
	public function sleep()
	{
		//
	}


	/**
	 * 在控制台中运行
	 * @return void
	 */
	public function runningInConsole()
	{
		//
	}

	/**
	 * 在 Mimic 中运行
	 * @return void
	 */
	public function runningInMimic()
	{
		//
	}

	/**
	 * 获得当前运行环境
	 * @return string
	 */
	public function environment()
	{
		//
	}
}
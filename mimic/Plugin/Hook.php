<?php
/**
 * Hook
 */

namespace Mimic\Plugin;

use Closure;
use Mimic\Contract\Plugin\Hook as HookContract;

class Hook implements HookContract
{
	/** @var array hooks */
	protected static $hooks = [];

	/** @var null hook */
	protected static $instance = null;

	/**
	 * 挂载钩子
	 * @param string $hook 钩子名
	 * @param \Closure $condition 挂载条件,返回 bool 值
	 */
	public function mount(string $hook, Closure $condition = null)
	{
		if ($condition) {
			if ($condition()) {
				$this->hooks[$hook] = [];
			}
		} else {
			$this->hooks[$hook] = [];
		}
	}

	/**
	 * 卸载钩子
	 * @param string $hook 钩子名
	 * @param \Closure $condition 卸载条件,返回 bool 值
	 * @return void
	 */
	public function unmount(string $hook, Closure $condition = null)
	{
		if ($condition) {
			if ($condition()) {
				unset($this->hooks[$hook]);
			}
		} else {
			unset($this->hooks[$hook]);
		}
	}

	/**
	 * 往钩子中注册事件
	 * @param string $hook 钩子名
	 * @param mixed $action 往钩子中注入的操作
	 * @param array $parameters
	 * @param Closure|null $callback 回调
	 * @throws \Mimic\Exception\MimicException
	 */
	public function register(string $hook, $action, $parameters = [], Closure $callback = null)
	{
		if (!isset($this->hooks[$hook])) {
			qz_e('没有' . $hook . '钩子');
		}

		$this->hooks[$hook][] = [
			'action' => $action,
			'parameters' => $parameters,
			'callback' => $callback
		];
	}

	/**
	 * 触发钩子
	 * @param string $hook
	 * @return mixed
	 */
	public function trigger(string $hook)
	{
		$return = '';

		foreach ($this->hooks[$hook] as $item) {
			$result = call_user_func_array([mimic($item['action']), 'handle'], $item['parameters']);

			if ($item['callback']) {
				$item['callback']($result);
			}

			if (is_string($result)) {
				$return .= $result;
			}
		}

		return $return;
	}

	/**
	 * 校检钩子
	 * @param string $hook 钩子名
	 * @return bool
	 */
	public function isActivate(string $hook)
	{
		if (isset($this->hooks[$hook])) {
			return true;
		}

		return false;
	}

	/**
	 * 获取钩子详情
	 * @param string $hook 钩子名
	 * @return mixed
	 * @throws \Mimic\Exception\MimicException
	 */
	public function getHook(string $hook)
	{
		if (!isset($this->hooks[$hook])) {
			qz_e('没有' . $hook . '钩子');
		}

		return $this->hooks[$hook];
	}

	/**
	 * 将 $hook 中的 $action 放置于 $reference 上方
	 * @param $hook
	 * @param $action
	 * @param $reference
	 * @return void
	 */
	public function adjustmentUp($hook, $action, $reference)
	{
		// todo: adjustmentUp()
	}

	/**
	 * 将 $hook 中的 $action 放置于 $reference 下面
	 * @param $hook
	 * @param $action
	 * @param $reference
	 * @return void
	 */
	public function adjustmentDown($hook, $action, $reference)
	{
		// todo: adjustmentDown()
	}

	/**
	 * 获取挂载的钩子的列表
	 * @return mixed
	 */
	public function getHookList()
	{
		return array_keys($this->hooks);
	}

	/**
	 * 获取事件在钩子中的位置
	 * @param $hook
	 * @param $action
	 * @return int|string
	 * @throws \Mimic\Exception\MimicException
	 */
	public function lookUpAction($hook, $action)
	{
		$index = 0;

		foreach ($this->hooks[$hook] as $key => $item) {
			if ($item['action'] == $action) {
				$index = $key + 1;
				break;
			}
		}

		if (!$index) {
			qz_e($hook . '中没有' . $action . '事件');
		}

		return $index - 1;
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
	 * @param HookContract|null $hook
	 * @return HookContract
	 */
	public static function setInstance(HookContract $hook = null)
	{
		return static::$instance = $hook;
	}

	/**
	 * 以方法前加_静态调用方法
	 * 如调用 mount: Hook::_mount(HOOK_NAME)
	 * @param $method 调用方法
	 * @param $parameters 调用参数
	 * @return mixed
	 */
	public static function __callStatic($method, $parameters)
	{
		return call_user_func_array([static::getInstance(), ltrim($method, '_')], $parameters);
	}
}
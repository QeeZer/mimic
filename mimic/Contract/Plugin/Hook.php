<?php
/**
 * Hook
 */

namespace Mimic\Contract\Plugin;

use Closure;

interface Hook
{
	/**
	 * 挂载钩子
	 * $hooks = [
	 *      'MIMIC_START_HOOK'  => [
	 *          [0]  => [
	 *              'action'  => TestClass::class,  // 事件
	 *              'parameters'  => [new TestDependClass, 'second param'], // 参数
	 *              'callback'  => (function(){ return null; })
	 *          ],
	 *      ],
	 * ]
	 * @param string $hook 钩子名
	 * @param bool $condition 挂载条件
	 * @return void
	 */
	public function mount(string $hook, bool $condition = true);

	/**
	 * 卸载钩子
	 * @param string $hook 钩子名
	 * @param bool $condition 卸载条件
	 * @return void
	 */
	public function unmount(string $hook, bool $condition = true);

	/**
	 * 往钩子中注册事件
	 * @param string $hook 钩子名
	 * @param mixed $action 往钩子中注入的操作
	 * @param array $parameters
	 * @param Closure|null $callback 回调
	 * @return void
	 */
	public function register(string $hook, $action, $parameters = [], Closure $callback = null);

	/**
	 * 校检钩子
	 * @param string $hook 钩子名
	 * @return bool
	 */
	public function isActivate(string $hook);

	/**
	 * 获取钩子详情
	 * @param string $hook 钩子名
	 * @return mixed
	 */
	public function getHook(string $hook = '');

	/**
	 * 设置钩子事件的执行顺序
	 * @param string $hook 钩子名
	 * @param array $sortArray 钩子执行顺序数组
	 * @return void
	 */
	public function setHookActionSort(string $hook, array $sortArray);

	/**
	 * 获取挂载的钩子的列表
	 * @return mixed
	 */
	public function getHookList();
}
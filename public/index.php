<?php
/**
 * Index File
 */

use Mimic\Plugin\MimicSlot;
use Mimic\Exception\MimicException;

define('MIMIC_START', microtime(true));

define('ROOT_DIR', strtr(dirname(dirname(__FILE__)), '\\', '/').'/');

/** require vendor */
require ROOT_DIR . 'vendor/autoload.php';

try {

	/** mimic */
	$mimic = require ROOT_DIR . 'init.php';

	/** MimicSlot::run() */
	$mimic->make(MimicSlot::class)->run();

	/*$a = $mimic->make(MimicSlot::class)->getPluginInfo('Test');
	var_dump($a);*/

} catch (MimicException $e) {
	$e->handle();
}
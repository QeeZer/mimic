<?php
/**
 * Index File
 */

use Mimic\Plugin\MimicSlot;

define('MIMIC_START', microtime(true));

define('ROOT_DIR', strtr(dirname(dirname(__FILE__)), '\\', '/').'/');

/** 引入 vendor */
require ROOT_DIR . 'vendor/autoload.php';

try {

	/** mimic */
	$mimic = require ROOT_DIR . 'init.php';

	/** MimicSlot::run() */
	$mimic->make(MimicSlot::class)->run();

} catch (\Mimic\Exception\MimicException $e) {
	$e->handle();
}
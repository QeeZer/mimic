<?php
/**
 * Index File
 */

define('MIMIC_START', microtime(true));

define('ROOT_DIR', strtr(dirname(dirname(__FILE__)), '\\', '/').'/');

/** 引入 vendor */
require ROOT_DIR . 'vendor/autoload.php';

/** mimic */
$mimic = require ROOT_DIR . 'init.php';

<?php

define('TA_DS', DIRECTORY_SEPARATOR);
define('TA_ROOT_DIR', dirname(__FILE__) . TA_DS);
define('TA_CONFIG_DIR', TA_ROOT_DIR . 'config' . TA_DS);

require(TA_CONFIG_DIR . 'config.php');

Dispatcher::getInstance()->dispatch();

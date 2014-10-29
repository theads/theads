<?php

require_once(TA_CONFIG_DIR . 'constans.php');
require_once(TA_CONFIG_DIR . 'defines.php');
require_once(TA_CONFIG_DIR . 'includes.php');

/* Improve PHP configuration to prevent issues */
ini_set('upload_max_filesize', '100M');
ini_set('default_charset', 'utf-8');
ini_set('magic_quotes_runtime', 0);

date_default_timezone_set(Configuration::get('timezone'));

Response::addHeader('Content-type', 'text/html; charset=utf-8');

iconv_set_encoding("internal_encoding", "UTF-8");

/* include files */






<?php

define('TA_MODE', TA_MODE_DEV);

switch(TA_MODE) {
    case TA_MODE_DEV:
            @ini_set('display_errors', 'on');
            @error_reporting(E_ALL | E_STRICT);
        break;
    
    case TA_MODE_PROD:
            @ini_set('display_errors', 'off');
        break;
    
    default:
        die();
}

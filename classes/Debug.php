<?php

final class Debug {
    
    private static $instance = null;
    
    private $log = array();

    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new Debug();
        }
        return self::$instance;
    }
    
    public static function log() {
        if(TA_MODE != TA_MODE_PROD) {
            self::getInstance()->addToLog(self::debugMethod($item));
        }
    }
    
    public static function show($item) {
        if(TA_MODE != TA_MODE_PROD) {
            echo '<pre>';
            echo self::debugMethod($item);
            echo '</pre>';
        }
    }
    
    private static function debugMethod($item) {
        return print_r($item, true);
    }
    
    private function addToLog($item) {
        $this->log[] = array(
            $item
        );
    }
    
}


<?php

class Configuration {
    
    private static $instance = null;
    
    private $values = array();
    
    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new Configuration();
        }
        return self::$instance;
    }

    public static function get($name) {
        return self::getInstance()->getValue($name);
    }
    
    protected function __construct() {
        if(file_exists(TA_CACHE_DIR . 'config' . TA_DS . 'config.php')) {
            $this->values = include TA_CACHE_DIR . 'config' . TA_DS . 'config.php';
        } else {
            $this->values = include TA_CACHE_DIR . 'config' . TA_DS . 'default.php';
        }
    }
    
    private function getValue($name) {
        if(array_key_exists($name, $this->values)) {
            return $this->values[$name];
        }
        return false;
    }
}


<?php

final class Dispatcher {
    
    private static $instance = null;
    
    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new Dispatcher();
        }
        return self::$instance;
    }
    
    protected function __construct() {
        $this->use_routes = (bool)Configuration::get(TA_USE_REWRITE);
        Router::resolve()->process();
        
        Debug::show(Configuration::getInstance());
    }
    
    public function dispatch() {
        echo Response::getInstace()->render();
    }
    
    private function setContext() {
        
    }
}

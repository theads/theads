<?php

final class Context {
    
    private static $instance = null;
    
    public function getInstance() {
        if(self::$instance === null) {
            self::$instance = new Context();
        }
        return self::$instance;
    }
    
    protected function __construct() {
        
    }
    
}


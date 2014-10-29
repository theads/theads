<?php

final class Router {
    
    private static $instance = null;
    
    private $default_routes = array(
        'category' => array(
            
        )
    );
    
    public static final function getInstance() {
        if(self::$instance == null) {
            self::$instance = new Router();
        }
        return self::$instance;
    }
    
    public function resolve() {
        
    }
    
    public function process() {
        
    }
    
}


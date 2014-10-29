<?php

final class Response {
    
    private static $instance = null;
    
    /**
     *
     * @var Smarty
     */
    private $smarty = null;

    private $headers = array();
    
    private $debug = array();
    
    /**
     * 
     * @return Response
     */
    public static function getInstace() {
        if(self::$instance === null) {
            self::$instance = new Response();
        }
        return self::$instance;
    }
    
    public static function addHeader($name, $value) {
        self::getInstace()->setHeader($name, $value);
    }

    public function addDebug($info) {
        $record = array(
            'callstack' => array(),
            'value' => $info
        );
        $db = array_reverse (debug_backtrace());
        if(!empty($db)) {
            foreach($db as $k => $v) {
                if($v['class'] != 'Response' && $v['function'] != 'addDebug') {
                    $record['callstack'][] = $v;
                }
            }
        }
        $this->debug[] = $record;
    }

    protected function __construct() {
        $this->initSmarty();
    }
    
    private function setHeader($name, $value) {
        $this->headers[$name] = $value;
    }
    
    private function initSmarty() {
        $this->smarty = new Smarty();
        $this->smarty->setCompileDir(TA_TMP_DIR . 'smarty');
        if(Configuration::get(TA_USE_CACHE) === true && Configuration::get(TA_USE_SMARTY_CACHE) === true){
            $this->smarty->setCacheDir(TA_CACHE_DIR . 'smarty');
        } else {
            $this->smarty->caching = false;
        }
    }    
    
    private function redirect() {
        return false;
    }
    
    private function headers() {
        if(!headers_sent()) {
            foreach($this->headers as $k => $v) {
                header(sprintf('%s: %s', $k, $v));
            }
        }
    }
    
    public function render() {
        if($this->redirect() !== false) {
            return header(sprintf('Location: %s', $this->redirect()));
        } else {
            $this->headers();
            $this->smarty->assign('config', array(
                'media_server' => Configuration::get(TA_MEDIA_SERVER)?Configuration::get(TA_MEDIA_SERVER):'http://localhost/theads',
                'show_debug' => (TA_MODE == TA_MODE_DEV)?true:false,
                'debug' => (TA_MODE == TA_MODE_DEV)?$this->debug:array()
            ));
            $this->smarty->setTemplateDir(TA_THEMES_DIR .Configuration::get(TA_TEMPLATE_NAME) . TA_DS);
            echo $this->smarty->display('index.tpl');
        }
    }
    
}


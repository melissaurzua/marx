<?php

class Application {

    /**
     * @var Application
     */
    protected static $_instance;

    /**
     * @return Application
     */
    public static function getInstance() {
        if (is_null(self::$_instance)){
            self::$_instance = new Application();
        }
        return self::$_instance;
    }

    /**
     * @var Db
     */
    protected $_db;

    /**
     * @var Router
     */
    protected $_router;

    /**
     * @var View
     */
    protected $_view;

    /**
     * @var Controller
     */
    protected $_controller;

    /**
     * @var Config
     */
    protected $_config;

    /**
     * @var Session
     */
    protected $_session;

    /**
     * @var Request
     */
    protected $_request;

    /**
     *
     */
    public function __construct() {
        $this->_config = new Config();
    }

    /**
     *
     */
    public function init() {
        $this->_session = new Session();
        $this->_db = new Db();
        $this->_router = new Router();
        $this->_request = new Request();
    }

    /**
     *
     */
    public function run() {
        if ($this->getRequest()->response == 'json'){
            $this->_view = new ViewJson();
        } else {
            $this->_view = new View();
        }

        $this->getSession()->open();
        $this->_router->route();
    }


    /**
     *
     */
    public function finish() {
        $this->getView()->render();
        $this->getSession()->close();
    }

    /**
     * @return Request
     */
    public function getRequest() {
        return $this->_request;
    }

    /**
     * @return Session
     */
    public function getSession() {
        return $this->_session;
    }

    /**
     * @return Db
     */
    public function getDb(){
        return $this->_db;
    }

    /**
     * @return Router
     */
    public function getRouter() {
        return $this->_router;
    }

    /**
     * @return View
     */
    public function getView() {
        return $this->_view;
    }

    /**
     * @return Controller
     */
    public function getController() {
        return $this->_controller;
    }

    public function setController(Controller $controller){
        $this->_controller = $controller;
    }

    public function getConfig() {
        return $this->_config;
    }





}
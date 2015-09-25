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
   * Creates Config & Session
   */
  public function __construct() {
  	$this->_config = new Config();
		$this->_session = new Session();

		$this->_session->open();
  }

  /**
   * Creates Db, Router & Request
   */
  public function init() {
  	$this->_db = new Db();
  	$this->_router = new Router();
  	$this->_request = new Request();
  }

  /**
   * Creates View & Routes
   */
  public function run() {
		$this->_view = $this->_getView();
  	$this->_router->route();
  }


  /**
   * Renders view & closes session
   */
  public function finish() {
		$this->_view->init();
		$this->_view->sendHeaders();
		echo $this->getView()->render();
		$this->getSession()->close();
  }

	/**
	 * @return View
	 */
	protected function _getView() {
		$defaultViewName = $viewName = 'Html';
		if (isset($this->getRequest()->response)){
			$viewName = $this->getRequest()->response;
		}
		$viewClassName = 'View' . $viewName;
		if (!class_exists($viewName)){
			$viewClassName = 'View' . $defaultViewName;
		}
		return new $viewClassName();
	}

  /**
	 * Returns Request
	 *
   * @return Request
   */
  public function getRequest() {
  	return $this->_request;
  }

  /**
	 * Returns Session
	 *
   * @return Session
   */
  public function getSession() {
  	return $this->_session;
  }

  /**
	 * Returns Db
   * @return Db
   */
  public function getDb(){
  	return $this->_db;
  }

  /**
	 * Returns Router
	 *
   * @return Router
   */
  public function getRouter() {
  	return $this->_router;
  }

  /**
	 * Returns View
	 *
   * @return View
   */
  public function getView() {
  	return $this->_view;
  }

  /**
	 * Returns Controller
	 *
   * @return Controller
   */
  public function getController() {
  	return $this->_controller;
  }

	/**
	 * Sets Controller
	 *
	 * @param Controller $controller
	 */
  public function setController(Controller $controller){
  	$this->_controller = $controller;
  }

	/**
	 * Returns View
	 *
	 * @return Config
	 */
  public function getConfig() {
  	return $this->_config;
  }

}
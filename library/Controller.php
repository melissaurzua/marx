<?php

class Controller {

	/**
	 * @var ControllerData
	 */
	protected $_data;

	/**
	 * @var Request
	 */
	protected $_request;

	/**
	 * @var Db
	 */
	protected $_db;

	/**
	 * @var bool
	 */
	protected $_protectedAction = true;

	/**
	 * Init Data
	 */
	public function __construct() {
		$this->_data = new ControllerData();
		$this->_data->title = '404';
		$this->_db = Application::getInstance()->getDb();
		$this->_request = Application::getInstance()->getRequest();
	}

	/**
	 *
	 */
	public function init() {

	}

	/**
	 * Execute Controller
	 */
	public function execute() {}

	/**
	 * @return ControllerData
	 */
	public function getData() {
		return $this->_data;
	}

	/**
	 * @return null|string
	 */
	public function getTemplate() {
			return 'default';
	}

	/**
	 * @return bool
	 */
	public function isProtected() {
		return $this->_protectedAction;
	}

}
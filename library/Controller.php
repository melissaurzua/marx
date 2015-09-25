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
	 * Init Data
	 */
	public function __construct() {
		$this->_data = new ControllerData();
		$this->_db = Application::getInstance()->getDb();
		$this->_request = Application::getInstance()->getRequest();
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
			return null;
	}


}
<?php

class View {

	/**
	 * @var Controller
	 */
	protected $_controller;

	/**
	 * @var ControllerData;
	 */
	public $data;

	/**
	 * @var string
	 */
	public $content;

	/**
	 * Inits View
	 */
	public function init() {
		$this->_controller = Application::getInstance()->getController();
		$this->data = $this->_controller->getData();
	}

	/**
	 * @return string
	 */
	public function render() {
		return '';
	}

	/**
	 * Sends Headers
	 */
	public function sendHeaders() {}

	/**
	 * Includes a part
	 *
	 * @param string $name
	 */
	public function getPart($name){
			include BASE_PATH . 'assets/parts/' . $name . '.php';
	}

	/**
	 * @return Controller
	 */
	public function getController() {
		return $this->_controller;
	}

	/**
	 * @return ControllerData
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * @param string $name
	 * @return string
	 */
	protected function _parseTemplate($name){
		ob_start();
		include BASE_PATH . 'assets/templates/' . $name . '.php';
		$data = ob_get_contents();
		ob_end_clean();
		return $data;
	}

}
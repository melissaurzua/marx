<?php

class Request {

	/**
	 * @var object
	 */
	protected $_request;

	/**
	 * @var string
	 */
	protected $_requestUri;

	/**
	 * Parses request
	 */
	public function __construct() {
		$this->_initRequest();
		$this->_initUriRequest();
	}

	/**
	 * @return object
	 */
	public function getParams(){
		return $this->_request;
	}

	/**
	 * Returns request uri
	 *
	 * @return string
	 */
	public function getUri() {
		return $this->_requestUri;
	}

	/**
	 * Sets initial request data
	 */
	protected function _initRequest() {
		$this->_request = (object)$_REQUEST;
		$this->_requestUri = $_SERVER['REQUEST_URI'];
	}

	/**
	 * Parses uri by pattern /key/value/key/value/
	 */
	protected function _initUriRequest() {
		$cleanUri = $this->_requestUri;
		if (strpos($this->_requestUri, ROOT) === 0) {
			$cleanUri = substr($this->_requestUri, strlen(ROOT));
		}
		$segments = explode('/', $cleanUri);
		$segmentsCount = count($segments);
		if ($segmentsCount > 0) {
			for ($i = 0; $i < $segmentsCount; $i = $i + 2) {
				if ($segments[$i] != '') {
					$this->_request->{urldecode($segments[$i])} = isset($segments[$i + 1]) ? urldecode($segments[$i + 1]) : null;
				}
			}
		}
	}

	/**
	 * Returns Param
	 *
	 * @param string $key
	 * @return null|string
	 */
	public function __get($key) {
		if (isset($this->_request->$key)){
			return $this->_request->$key;
		}
		return null;
	}

	/**
	 * Sets Param
	 *
	 * @param string $key
	 * @param string $value
	 */
	public function __set($key, $value){
		$this->_request->$key = $value;
	}

	/**
	 * Checks if param is set
	 *
	 * @param string $key
	 * @return bool
	 */
	public function __isset($key) {
		return isset($this->_request->$key);
	}
}
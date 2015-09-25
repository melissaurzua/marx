<?php

class Session {

	/**
	 * @var stdClass
	 */
	protected $_data;

	/**
	 * Opens Session
	 */
	public function open() {
		session_start();
		if (!isset($_SESSION['marx'])){
			$_SESSION['marx'] = new stdClass();
		}
		$this->_data = $_SESSION['marx'];
		$this->_data->lastAccess = time();
	}

	/**
	 * Closes Session
	 */
	public function close() {
		session_write_close();
	}

	/**
	 * Get
	 *
	 * @param string $key
	 * @return mixed
	 */
	public function __get($key){
		return $this->_data->$key;
	}

	/**
	 * Set
	 *
	 * @param string $key
	 * @param mixed $value
	 */
	public function __set($key, $value) {
		$this->_data->$key = $value;
	}

	/**
	 * Isset
	 *
	 * @param string $key
	 * @return bool
	 */
	public function __isset($key) {
		return isset($this->_data->$key);
	}


}
<?php

class Loader {

	/**
	 * Register
	 */
	public function __construct() {
		spl_autoload_register(
				array($this, 'autoload')
		);
  }

	/**
	 * Load Class
	 *
	 * @param string $className
	 */
	public function autoload($className) {
		$path = BASE_PATH . 'library/' . $className . '.php';
		if (file_exists($path)){
				require_once $path;
		}
	}

}
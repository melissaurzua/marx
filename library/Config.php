<?php

class Config {

	public function __construct() {
		$rootDir = substr($_SERVER['SCRIPT_FILENAME'], 0, strlen($_SERVER['SCRIPT_FILENAME'])-strlen($_SERVER['SCRIPT_NAME']));
		$this->root = substr(BASE_PATH, strlen($rootDir));
	}

}
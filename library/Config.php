<?php

class Config {

	public function __construct() {
		$configValues = parse_ini_file(BASE_PATH . 'assets/config/config.ini', true);
		foreach($configValues as $k => $v){
			$this->$k = is_array($v) ? (object)$v : $v;
		}
		$rootDir = substr($_SERVER['SCRIPT_FILENAME'], 0, strlen($_SERVER['SCRIPT_FILENAME'])-strlen($_SERVER['SCRIPT_NAME']));
		$this->root = substr(BASE_PATH, strlen($rootDir));
	}

}
<?php

class DB extends PDO {

	/**
	 * @var Model[]
	 */
	protected $_models = array();

	/**
	 * Open DB Donnection
	 */
	public function __construct() {
		$config = Application::getInstance()->getConfig();
		parent::__construct(
			'mysql:host=localhost;port='
				. $config->db->port
				. ';dbname='
				. $config->db->name,
			$config->db->username,
			$config->db->password,
			array(
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			)
		);
	}

	/**
	 * @param string $name
	 * @return Model
	 */
	public function getModel($name){
		if (!isset($this->_models[$name])){
			$className = 'Model' . ucfirst($name);
			if (!class_exists($className)){
				$className = 'Model';
			}
			$this->_models[$name] =  new $className($this, $name);
		}
		return $this->_models[$name];
	}

}
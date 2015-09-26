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
			'mysql:host='
				. $config->db->host
				. ';port='
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
	 * @return Model|ModelTransaction|ModelGroup
	 */
	public function getModel($name){
		$name = strtolower($name);
		if (!isset($this->_models[$name])){
			$nameParts = explode('_', $name);
			$name = '';
			foreach($nameParts as $namePart){
				$name .= ucfirst($namePart);
			}
			$className = 'Model' . $name;
			if (!class_exists($className)){
				$className = 'Model';
			}
			$this->_models[$name] =  new $className($this, $name);
		}
		return $this->_models[$name];
	}

}
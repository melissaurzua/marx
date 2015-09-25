<?php

class Model {

	/**
	 * @var Db
	 */
	protected $_db;

	/**
	 * @var string
	 */
	protected $_name;

	/**
	 * @param Db $db
	 * @param string $name
	 */
	public function __construct(Db $db, $name) {
		$this->_db = $db;
		$this->_name = $name;
	}

	/**
	 * @param int $id
	 * @return Record|null
	 */
	public function find($id) {
		$statement = $this->_db->prepare('SELECT * FROM ' . $this->_name . ' WHERE id = :id');
		$statement->bindValue(':id', $id, PDO::PARAM_INT);
		$statement->execute();
		return $statement->rowCount() == 1 ? $statement->fetchObject('Record') : null;
	}

	public function insert($values) {

	}

	public function delete($id) {

	}

	public function update($id, $values) {

	}

}
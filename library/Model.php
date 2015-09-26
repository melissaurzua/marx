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
		$statement = $this->_db->prepare('SELECT * FROM `' . strtolower($this->_name) . '` WHERE id = :id');
		$statement->bindValue(':id', $id, PDO::PARAM_INT);
		$statement->execute();
		return $statement->rowCount() == 1 ? $statement->fetchObject('Record') : null;
	}

	public function all() {
		$statement = $this->_db->prepare('SELECT * FROM `' . $this->_name . '`');
		$statement->execute();
		return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_CLASS, 'Record') : array();
	}

	public function findSome($values){
		$where = array();
		foreach($values as $k => $v){
			$where[] = '`' . $k . '` = :' . $k;
		}

		$statement = $this->_db->prepare('SELECT * FROM `' . $this->_name . '` WHERE ' . implode(' AND ', $where));

		foreach($values as $k => $v){
			$statement->bindParam(':' . $k, $v);
		}
		$statement->execute();

		return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_CLASS, 'Record') : array();


	}

	public function insert($values) {
		$keys = array();
		$params = array();


		foreach($values as $k => $v){
			if (!is_null($v)){
				$keys[] = '`' . $k . '`';
				$params[] = '"' . $v . '"';
			}
		}
		$statement = $this->_db->prepare(
			'INSERT INTO `'
			. $this->_name
			. '` ('
			. implode(',', $keys)
			. ') VALUES ('
			. implode(',', $params)
			. ')'
		);

		$statement->execute();

		return $statement->rowCount() > 0;
	}

	public function delete($id) {

	}

	public function update($id, $values) {

	}

}
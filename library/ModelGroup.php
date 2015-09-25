<?php

class ModelGroup extends Model {


	public function __construct(Db $db, $name) {
		parent::__construct($db, 'group');
	}

	/**
	 * @return Record[]
	 */
	public function all() {
		$records =  parent::all();

		$ownGroup = new Record();
		$ownGroup->name = 'Meins';
		$ownGroup->id = 0;
		$ownGroup->own = true;

		$records[] = $ownGroup;
		return $records;
	}


	public function getMembers(Record $group) {
		$statement = $this->_db->prepare('
			SELECT `user`.* FROM `user`
			LEFT JOIN `group_user` AS `group_user` ON `user`.`id` = `group_user`.`id_user`
			WHERE `group_user`.`id_group` = :id
		');
		$statement->bindValue(':id', $group->id, PDO::PARAM_INT);
		$statement->execute();
		return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_CLASS, 'Record') : array();
	}

}
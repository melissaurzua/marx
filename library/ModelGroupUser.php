<?php

class ModelGroupUser extends Model {

	/**
	 * @param Db $db
	 * @param string $name
	 */
	public function __construct(Db $db, $name) {
		parent::__construct($db, 'group_user');
	}


	public function getId($userId, $groupId){
		$groups = $this->findSome(
			array(
				'id_user' => $userId,
				'id_group' => $groupId
			)
		);

		if (isset($groups[0])) {
			return $groups[0]->id;
		} else {
			return null;
		}

	}

}
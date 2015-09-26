<?php

class ModelTransaction extends Model {

	/**
	 * @param Db $db
	 * @param string $name
	 */
	public function __construct(Db $db, $name) {
		parent::__construct($db, 'transaction');
	}

	/**
	 * @param Record $group
	 * @param int $month
	 * @param int $year
	 * @param Record[] $groupMembers
	 */
	public function calculateMonth($group, $month, $year, $groupMembers = null){
		$groupMembers = is_null($groupMembers) ? $this->_db->getModel('group')->getMembers($group) : $groupMembers;
	}


	public function add($group, $user, $value, $title, $cycle, $transactionType = null){
		if (is_null($transactionType)){
			$transactionType = ($cycle > 0 ? 3 : 2);
		}
		$this->insert(array(
			'id_group_user' => $this->_db->getModel('group_user')->getId($user->id, $group->id),
			'id_transaction_type' => $transactionType,
			'value' => $value,
			'date' => date('Y-m-d H:i:s'),
			'date_execution' => date('Y-m-d H:i:s'),
			'executed' => 0,
			'title' => $title,
			'id_transaction_cycle' => ($cycle > 0 ? $cycle : null)
		));


	}

	/**
	 * @param $user
	 * @param $month
	 * @param $year
	 * @return int
	 */
	public function getByUserMonth($user, $month, $year){
		$statement = $this->_db->prepare('
			SELECT SUM(`transaction`.value) AS `total`
			FROM `transaction`
			LEFT JOIN `group_user` AS `group_user` ON `transaction`.`id_group_user` = `group_user`.`id`
			WHERE year(`transaction`.`date_execution`) = :year
				AND  month(`transaction`.`date_execution`) = :month
				AND `group_user`.`id_user` = :user'
		);

		$statement->bindValue(':month', $month, PDO::PARAM_INT);
		$statement->bindValue(':year',  $year, PDO::PARAM_INT);
		$statement->bindValue(':user',  $user->id, PDO::PARAM_INT);
		$statement->execute();
		return $statement->rowCount() == 1 ? (int)$statement->fetchObject( 'Record')->total : 0;
	}

	/**
	 * @param $group
	 * @param $month
	 * @param $year
	 * @return array
	 */
	public function getByMonth($group, $month, $year){
		$statement = $this->_db->prepare('
			SELECT `transaction`.*, `user`.*
			FROM `transaction`
			LEFT JOIN `group_user` AS `group_user` ON `transaction`.`id_group_user` = `group_user`.`id`
			LEFT JOIN `user` AS `user` ON `group_user`.`id_user` = `user`.`id`
			WHERE year(`transaction`.`date_execution`) = :year
				AND  month(`transaction`.`date_execution`) = :month
				AND `group_user`.`id_group` = :group
			ORDER BY `transaction`.`date_execution` ASC
			');

		$statement->bindValue(':month', $month, PDO::PARAM_INT);
		$statement->bindValue(':year',  $year, PDO::PARAM_INT);
		$statement->bindValue(':group',  $group->id, PDO::PARAM_INT);
		$statement->execute();

		return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_CLASS, 'Record') : array();
	}

	public function getBalance($group, $start, $end){
		$statement = $this->_db->prepare('
			SELECT SUM(`transaction`.`value`) AS `balance`
			FROM `transaction`
			LEFT JOIN `group_user` ON `transaction`.`id_group_user` = `group_user`.`id`
			WHERE date_execution >= :start AND date_execution <= :end
		');

		$statement->bindParam(':start', $start);
		$statement->bindParam(':end', $end);
		$statement->execute();

		return $statement->rowCount() == 1 ? (int)$statement->fetchObject( 'Record')->balance : 0;
	}







}
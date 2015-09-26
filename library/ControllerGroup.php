<?php

class ControllerGroup extends Controller {

	/**
	 * @var Record
	 */
	protected $_group;

	/**
	 * @var Record[]
	 */
	protected $_members;

	/**
	 * @var ModelGroup
	 */
	protected $_model;

	/**
	 * @var int
	 */
	protected $_month;

	/**
	 * @var int
	 */
	protected $_year;

	/**
	 * @var ModelTransaction
	 */
	protected $_transactionModel;

	public function init() {
		$this->_model = $this->_db->getModel('group');

		$this->_group = $this->_model->find(
			$this->_request->id
		);

		if (!is_null($this->_group)){
			Application::getInstance()->getSession()->group = $this->_group;
		}

		$this->_members = $this->_model->getMembers(
			$this->_group
		);
		$this->_transactionModel = $this->_db->getModel('transaction');
		$this->_month = (int)(isset($this->_request->month) ? $this->_request->month : date('m'));
		$this->_year = (int)(isset($this->_request->year) ? $this->_request->year : date('Y'));



	}


	public function execute() {
		/**
		 * List all transaction
		 */
		$transactions = $this->_transactionModel->getByMonth(
			$this->_group,
			$this->_month,
			$this->_year
		);

		$transactionsByDay = array();
		$lastDay = null;

		foreach($transactions as $transaction){
			$day = (int)date('d', strtotime($transaction->date_execution));
			if (!isset($transactionsByDay[$day])){
				$transactionsByDay[$day] = (object)array(
					'day' => $day,
					'transactions' => array()
				);
			}
			$transactionsByDay[$day]->transactions[] = $transaction;
		}


		/**
		 * Calculate Months
		 */
		$days = array();
		for($i = 1; $i < cal_days_in_month(CAL_GREGORIAN, $this->_month, $this->_year); $i++){
			$days[] = (object)array(
				'name' => $i,
				'active' => $i == date('d') && $this->_year = date('Y')
			);
		}


		/**
		 * Set Data
		 */
		$this->getData()->transactionsByDay = $transactionsByDay;
		$this->getData()->month = $this->_month;
		$this->getData()->year = $this->_year;
		$this->getData()->days = $days;
		$this->getData()->members = $this->calculateMembers($this->_month, $this->_year);
		$this->getData()->group = $this->_group;
		$this->getData()->update = $this->_month == date('m');
		$this->getData()->activeIndex = 1;
		$this->getData()->monthTitle =  strftime(
			'%B',
			mktime(null, null, null, $this->_month, 1, $this->_year)
		);
	}


	public function calculateMembers($month, $year, $clone = false) {
		$p = 0;
		$v = 0;
		$parsedMembers = array();
		foreach($this->_members as $member){
			$total = $this->_transactionModel->getByUserMonth(
				$member,
				$month,
				$year
			);
			$v += $member->total = $total;
			$member->type = 'member';

			$p += $member->percentage = $total > 0 ? 1 / $this->_group->limit * $total : 0;

			$parsedMembers[] = $clone ? clone $member: $member;
		}
		$budget = new Record();
		$budget->id = 0;
		$budget->type = 'balance';
		$budget->name = 'Guthaben';
		$budget->total = $this->_group->limit - $v;
		$budget->percentage = 1 - $p;
		$parsedMembers[] = $budget;
		return $parsedMembers;
	}

	/**
	 * @return null|string
	 */
	public function getTemplate() {
		return 'group';
	}


}
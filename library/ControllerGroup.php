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

	protected $_transactionModel;

	public function init() {
		$this->_model = $this->_db->getModel('group');

		$this->_group = $this->_model->find(
			$this->_request->id
		);

		Application::getInstance()->getSession()->group = $this->_group;

		$this->_members = $this->_model->getMembers(
			$this->_group
		);
		$this->_transactionModel = $this->_db->getModel('transaction');
		$this->_month = (int)(isset($this->_request->month) ? $this->_request->mont : date('m'));
		$this->_year = (int)(isset($this->_request->year) ? $this->_request->year : date('Y'));
	}


	public function execute() {
		/**
		 * List all transaction
		 */
		$this->getData()->transactions = $this->_transactionModel->getByMonth(
			$this->_group,
			$this->_month,
			$this->_year
		);


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
		$this->getData()->month = $this->_month;
		$this->getData()->year = $this->_year;
		$this->getData()->days = $days;
		$this->getData()->members = $this->calculateMembers($this->_month, $this->_year);
		$this->getData()->group = $this->_group;
	}


	public function calculateMembers($month, $year) {
		$p = 0;
		$members = $this->_members;
		foreach($members as $member){
			$total = $this->_transactionModel->getByUserMonth(
				$member,
				$month,
				$year
			);
			$member->total = $total;
			$member->type = 'member';

			$p += $member->percentage = $total > 0 ? 1 / $this->_group->limit * $total : 0;
		}
		$budget = new Record();
		$budget->type = 'balance';
		$budget->name = 'Guthaben';
		$budget->percentage = 1 - $p;
		$members[] = $budget;
		return $members;
	}

	/**
	 * @return null|string
	 */
	public function getTemplate() {
		return 'group';
	}


}
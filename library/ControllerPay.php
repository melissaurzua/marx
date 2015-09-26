<?php

class ControllerPay extends Controller {

	protected $_template = 'pay';

	protected $_companies = array(
		'Coop',
		'Migros',
		'Post',
		'Drinks'
	);



	public function execute() {
		shuffle($this->_companies);
		$session = Application::getInstance()->getSession();
		$defaultGroup = isset($session->group) ? $session->group->id : null;
		$value = isset($this->_request->value) ? $this->_request->value : rand(40, 80);
		$title = isset($this->_request->title) ? $this->_request->title : $this->_companies[0];
		$idGroup = isset($this->_request->id_group) ? $this->_request->id_group : $defaultGroup;

		$transactionModel = $this->_db->getModel('transaction');


		if (isset($this->_request->pay)){
			$date = date('-m-Y', time());
			$lastDay = 31;
			$group = $this->_db->getModel('group')->find($idGroup);


			$balance = $transactionModel->getBalance(
				$group,
				date('1' . $date, time()),
				date($lastDay . $date, time())
			);

			if ($value <= $balance){
				$transactionModel->add(
					$group,
					$session->user,
					$value,
					$title,
					0,
					1
				);
				Application::getInstance()->getRouter()->reroute('group', $group->id);
			} else {
				$this->_template = 'pay_error';
			}
		}




		$this->getData()->groups = $this->_db->getModel('group')->all();
		$this->getData()->title = $title;
		$this->getData()->value = $value;
		$this->getData()->id_group = $idGroup;
	}


	public function getTemplate() {
		return $this->_template;
	}


}
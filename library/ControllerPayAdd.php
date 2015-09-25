<?php

class ControllerPayAdd extends Controller {


	public function execute() {
		$cycles = array();



		foreach(array('0' => '1X', '1' => 'Woche', '2' => 'Monat', '3' => 'Jahr') as $key => $title){
			$cycles[] = (object)array(
				'title' => $title,
				'key' => $key
			);
		}

		$transactionModel = $this->_db->getModel('transaction');
		if (isset($this->_request->value) && isset($this->_request->title) &&  isset($this->_request->cycle)){
			$session = Application::getInstance()->getSession();
			$transactionModel->add(
				$session->group,
				$session->user,
				$this->_request->value,
				$this->_request->title,
				$this->_request->cycle
			);
			Application::getInstance()->getRouter()->reroute('group', $session->group->id);
		}


		$this->getData()->cycles = $cycles;
	}

	public function getTemplate() {
		return 'pay_add';
	}


}
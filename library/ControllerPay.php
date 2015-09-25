<?php

class ControllerPay extends Controller {

	protected $_companies = array(
		'Coop',
		'Migros',
		'Post',
		'Drinks of the World'
	);



	public function execute() {
		shuffle($this->_companies);
		$value = rand(30, 70);
		$title = $this->_companies[0];



		$this->getData()->groups = $this->_db->getModel('group')->all();
		$this->getData()->title = $title;
		$this->getData()->value = $value;
	}


	public function getTemplate() {
		return 'pay';
	}


}
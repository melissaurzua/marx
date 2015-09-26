<?php

class ControllerShoppingList extends Controller {


	public function execute() {
		$model = $this->_db->getModel('shopping_list');

		$this->getData()->items = $model->all();

	}


	public function getTemplate() {
		return 'shopping_list';
	}


}
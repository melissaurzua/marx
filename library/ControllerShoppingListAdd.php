<?php

class ControllerShoppingListAdd extends Controller {


	public function execute() {
		$this->getData()->group = Application::getInstance()->getSession()->group;
	}


	public function getTemplate() {
		return 'shopping_list_add';
	}


}

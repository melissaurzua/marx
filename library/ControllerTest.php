<?php

class ControllerTest extends Controller {

	public function execute() {
		$this->getData()->name = 'gott';
	}


	public function getTemplate() {
		return 'home';
	}
}
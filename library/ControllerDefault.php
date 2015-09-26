<?php

class ControllerDefault extends Controller {


	public function execute() {
		$this->getData()->title = $this->_request->title;
	}



	public function getTemplate() {
		return 'default';
	}


}
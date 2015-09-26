<?php
/**
 * Created by PhpStorm.
 * User: heiko
 * Date: 25.09.15
 * Time: 13:57
 */
class ControllerGroups extends Controller {

	public function execute() {
		$this->getData()->groups = $this->_db->getModel('group')->all();
		$this->getData()->addAction = 'group_add';
		$this->getData()->splash = $this->_request->{'hide-splash'} != 1;
	}

	public function getTemplate() {
		return 'groups';
	}


}
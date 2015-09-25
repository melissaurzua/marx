<?php

class ControllerLogin extends Controller {


	protected $_protectedAction = false;



	/**
	 *
	 */
	public function execute() {



		$user = null;
		if (isset($this->_request->email)){
			$users = $this->_db->getModel('user')->findSome(
				array('email' => $this->_request->email)
			);

			if (isset($users[0])){
				$user = $users[0];
			}
		}
		if (isset($this->_request->password) && !is_null($user)){
			if ($user->password = md5($this->_request->password)){
				Application::getInstance()->getSession()->user = $user;
			}
		}

		if (isset(Application::getInstance()->getSession()->user)){
			Application::getInstance()->getRouter()->reroute('groups');
		}

	}


	/**
	 * @return null|string
	 */
	public function getTemplate(){
		return 'login';
	}


}
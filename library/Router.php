<?php

class Router {

	/**
	 * Routes to cotroller
	 */
	public function route() {
		$controller = $this->getController();
		Application::getInstance()->setController($controller);

		if (!isset(Application::getInstance()->getSession()->user) ){
			Application::getInstance()->getSession()->user = Application::getInstance()->getDb()->getModel('user')->find(3);
		}

		if (!isset(Application::getInstance()->getSession()->user) && $controller->isProtected()){
			Application::getInstance()->getRouter()->reroute('login');
		}

		$controller->init();
		$controller->execute();
	}

	public function reroute($controllerName, $id = null) {
		Header(
			'Location:'
			. ROOT
			. 'controller/'
			. $controllerName
			. '/'
			. (!is_null($id) ? 'id/' . $id . '/' : '')
		);
	}

	/**
	 * Creates controller by request/default-setting
	 *
	 * @return Controller
	 */
	public function getController() {
		$controllerName = null;
		if(isset(Application::getInstance()->getRequest()->controller)){
			$controllerNameParts = explode('_', Application::getInstance()->getRequest()->controller);
			$controllerName = '';
			foreach($controllerNameParts as $controllerNamePart){
				$controllerName .= ucfirst($controllerNamePart);
			}
		}
		$className = $this->getControllerName($controllerName);
		if (!is_null($controllerName) && class_exists($className)){
			return new $className();
		} else {
			return $this->getDefaultController();
		}
	}

	/**
	 * Gets controller class-name
	 *
	 * @param string $controllerName
	 * @return string
	 */
	public function getControllerName ($controllerName) {
			return 'Controller' . ucfirst($controllerName);
	}

	/**
	 * @return Controller
	 */
	public function getDefaultController() {
		$className = $this->getControllerName(
			Application::getInstance()->getConfig()->router->default
		);
		return new $className();
	}
}
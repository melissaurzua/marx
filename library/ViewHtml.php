<?php
/**
 * Created by PhpStorm.
 * User: heiko
 * Date: 24.09.15
 * Time: 22:34
 */
class ViewHtml extends View {

	/**
	 * Sends Headers
	 */
	public function sendHeaders() {
		header('Content-type:text/html;charset=utf8');
	}

	/**
	 * Renders view
	 *
	 * @return string
	 */
	public function render() {
		$this->data->onlyController = isset(Application::getInstance()->getRequest()->only_controller);
		$this->content = !is_null($this->_controller->getTemplate())
			? $this->_parseTemplate($this->_controller->getTemplate())
			: null;
		if ($this->data->onlyController){
			return $this->content;
		} else {
			return $this->_parseTemplate('index');
		}
	}


}

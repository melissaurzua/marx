<?php

class ViewJson extends View{

	public function render() {
		header('Content-Type: application/json');
		echo json_encode(
			Application::getInstance()->getController()->getData()
		);
	}




}
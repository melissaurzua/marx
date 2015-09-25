<?php

class ViewJson extends View{

	/**
	 * Sends headers
	 */
	public function sendHeaders() {
		header('Content-Type: application/json');
	}

	/**
	 * Renders View
	 *
	 * @return string
	 */
	public function render() {
		return json_encode(
			$this->getData()
		);
	}




}
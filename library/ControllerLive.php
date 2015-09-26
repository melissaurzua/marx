<?php

class ControllerLive extends ControllerGroup {


	public function execute() {
		$members = $this->calculateMembers($this->_month, $this->_year);

		$sizes = array();

		foreach($members as $member){
			$sizes[] = (object)array(
				'height' => $member->percentage * 100,
				'total' => $member->total . '.-',
				'id' => $member->id
			);
		}
		$this->getData()->sizes = $sizes;


	}


}
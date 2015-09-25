<?php

class ControllerGroupYear extends ControllerGroup {



	public function execute() {
		$months = array();
		for($i = 1; $i < 13; $i++){

			$months[] = (object)array(
				'month' => $i,
				'title' => strftime(
					'%B',
					mktime(null, null, null, $i, 1, $this->_year)
				),
				'type' => $this->getType($i),
				'members' => $this->calculateMembers(
					$i,
					$this->_year,
					true
				)
			);
		}

		$this->getData()->group = $this->_group;
		$this->getData()->year = $this->_year;
		$this->getData()->months = $months;
	}

	public function getType($month) {
		$currentYear = date('Y');
		$currentMonth = (int)date('m');
		if ($this->_year < $currentYear){
			return 'past';
		} else if ($this->_year > $currentYear){
			return 'future';
		} else if ($month > $currentMonth){
			return 'future';
		} else if ($month < $currentMonth){
			return 'past';
		} else {
			return 'current';
		}
	}


	public function getTemplate(){
		return 'group_year';
	}


}
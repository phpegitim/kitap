<?php

class NonMammalsClass extends AnimalsClass {

	private $giveBirth = 'Yumurtlama';
	
	function __construct() {
		parent::__construct('memeli olmayan');
	}

	public function getGiveBirth() {
		return $this -> giveBirth;
	}

}

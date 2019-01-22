<?php

class HorseClass extends MammalsClass{

	private $name;
	
	function __construct(string $name = null) {
		parent::__construct();
		$this -> setName($name);
	}

	public function getName() {
		return $this -> name;
	}

	public function setName($name) {
		$this -> name = $name;
	}
	
	public function makeNoise(){
		echo 'at gibi ses çıkarıyorum :))';
	}
	
}

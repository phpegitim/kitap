<?php

class BirdClass extends NonMammalsClass {
	
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
		echo 'Cik cik cik...';
	}
	
	public function fly(){
		echo '<b>uçuyorum...</b>';
	}

}

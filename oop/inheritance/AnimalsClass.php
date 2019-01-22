<?php

class AnimalsClass {

	private $family;
	
	const familyOptions = ['memeli','memeli olmayan'];

	function __construct(string $family) {
		$this->setFamily($family);
	}

	public function getFamily() {
		return ucwords($this -> family);
	}

	private function setFamily(string $family) {
		
		if(!in_array($family, self::familyOptions))
			throw new InvalidArgumentException("Familya geçersiz");
			
		$this -> family = $family;
	}
	
	public function makeNoise(){
		echo 'Ses: ....<br>';
	}

	public function sleep(){
		echo 'Uyku: ZzZzZ...<br>';
	}


}


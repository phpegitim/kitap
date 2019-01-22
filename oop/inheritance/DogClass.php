<?php

final class DogClass extends MammalsClass {
	
	private $name;
	
	function __construct(string $name = null) {
		parent::__construct();
		$this -> setName($name);
	}

	public function getName(){
		if($this->name==null)
			echo 'henüz bir adım yok :(<br>';
		
		return $this -> name;
	}

	public function setName($name){
		if($name==null)
			return false;
		
		if(strlen($name)<2)
			throw new RangeException('Bu kadar kısa bir adım olamaz');
					
		$this -> name = $name;
		
		return true;
	}
	
	public function makeNoise(){
		echo 'Hav Hav Hav...';
	}

}

<?php

class DogClass {

	private $color;
	private $eyeColor;
	private $height;
	private $length;
	public $weight;

	function __construct(String $color, String $eyeColor, int $height, int $length, int $weight) {
		$this -> color = $color;
		$this -> eyeColor = $eyeColor;
		$this -> height = $height;
		$this -> length = $length;
		$this -> weight = $weight;
	}

	function __destruct() {

	}
	
	/*
	function __sleep() {
		return ['color', 'eyeColor', 'weight'];
	}

	public function __wakeup() {
		echo 'Uyandım :) ';	
		$this -> showMyWeight();
	}
	*/
	
	function showMyWeight() {
		echo 'Benim şuanki kilom, ' . $this -> weight.'<br>';
	}

}

$dogDuman = new DogClass('Açık Gri', 'Siyah', 60, 155, 24);

$serDogDumanStr = serialize($dogDuman);

file_put_contents('DogDuman.ser', $serDogDumanStr);

$serDogDumanStr = file_get_contents('DogDuman.ser');
$unSerDogDuman = unserialize($serDogDumanStr);

echo $unSerDogDuman -> showMyWeight();

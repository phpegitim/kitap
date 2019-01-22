<?php

class ChickenClass implements BirdInterface {

	function __construct() {
	}

	function reProduce() {
		echo 'bir ' . $this . ' gibi çoğalıyor...<br>';
	}

	function eat($food) {
		echo 'bir ' . $this . ' gibi besleniyor(yemek:' . $food . ')...<br>';
	}

	function flap() {
		echo 'bir ' . $this . ' gibi kanat çırpıyor...<br>';
	}

	function __toString() {
		return 'tavuk(' . __CLASS__ . ')';
	}

}

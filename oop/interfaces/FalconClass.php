<?php

class FalconClass implements BirdInterface,FlyableInterface {

	function __construct() {
	}

	function eat($food) {

		if (!is_a($food, 'AnimalInterface'))
			echo '<i> bilgi: Ben bir şahinim, et içeren bir yemek yemeyi tercih ederim</i><br>';

		echo 'bir '.$this.' gibi besleniyor(yemek:' . $food . ')...<br>';
	}

	function flap() {
		echo 'bir '.$this.' gibi kanat çırpıyor...<br>';
	}

	function fly() {
		echo 'bir '.$this.' gibi uçuyor...<br>';
	}

	function reProduce() {
		echo 'bir '.$this.' gibi çoğalıyor...<br>';
	}
	
    function __toString(){
         return 'şahin('.__CLASS__.')';
    }		

}

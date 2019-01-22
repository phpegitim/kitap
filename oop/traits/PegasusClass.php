<?php

class PegasusClass extends HorseClass {

	use FlyableTrait;
	
	use SoarableTrait{
		SoarableTrait::fly insteadof FlyableTrait;
		SoarableTrait::setWing insteadof FlyableTrait;
		SoarableTrait::getWing insteadof FlyableTrait;
		SoarableTrait::fly as soar;
	}

	function __construct(string $name = 'pegasus') {
		parent::__construct();
		$this -> setName($name);
	}

}

<?php

trait SoarableTrait {

	private $leftWing;
	private $rightWing;

	public function fly() {

		if ($this -> leftWing == null || $this -> rightWing == null)
			throw new BadMethodCallException('Kanatlarım olmadan uçamam.<br>');

		echo 'Uçabiliyorum.<br>';
	}

	public function setWing(string $whichWing, WingClass $wing) {

		switch ($whichWing) {
			case 'left' :
				$this -> leftWing = $wing;
				break;
			case 'right' :
				$this -> rightWing = $wing;
				break;
			default :
				throw new InvalidArgumentException('Tanımsız kanat');
				break;
		}
	}

	public function getWing(string $whichWing) {

		switch ($whichWing) {
			case 'left' :
				return $this -> leftWing;
				break;
			case 'right' :
				return $this -> rightWing;
				break;
			default :
				throw new InvalidArgumentException('Tanımsız kanat');
				break;
		}
	}

}

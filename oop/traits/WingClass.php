<?php

class WingClass {

	private $length;

	function __construct(int $length = null) {
		if ($length != null)
			$this -> setLength($length);
	}

	public function setLength(int $length) {

		if ($length < 1)
			throw new InvalidArgumentException('Kanat uzunluğu en az 1 birim olmalıdır');

		$this -> length = $length;
	}

	public function getLength() {
		return $this -> length;
	}

}

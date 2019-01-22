<?php

namespace Classes;

class Staff extends \Abstracts\User {

	private $position;

	public function getPosition() {
		return $this -> position;
	}

	public function setPosition($position) {
		$this -> position = $position;
	}

}

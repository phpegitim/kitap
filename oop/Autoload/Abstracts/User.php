<?php

namespace Abstracts;

abstract class User implements \Interfaces\Person {

	private $name;
	private $userName;
	private $pass;

	public function getName() {
		return $this -> name;
	}

	public function setName($name) {
		$this -> name = $name;
	}

	public function getUserName() {
		return $this -> userName;
	}

	public function setUserName($userName) {
		$this -> userName = $userName;
	}

	public function getPass() {
		return $this -> pass;
	}

	public function setPass($pass) {
		$this -> pass = $pass;
	}

}

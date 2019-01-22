<?php

namespace App\Model\Entity;

class User {
		
	private $id;
	private $first_name;
	private $last_name;
	private $user_name;
	private $password;
	private $create_time;

	function __construct(int $id = null, string $first_name = null, string $last_name = null, string $user_name = null, string $password = null, string $create_time = null) {
		$this -> setId($id);
		$this -> setFirstName($first_name);
		$this -> setLastName($last_name);
		$this -> setUserName($user_name);
		$this -> setPassword($password);
		$this -> setCreateTime($create_time);
	}

	public function getId() {
		return (int)$this -> id;
	}

	public function setId($id) {
		if ($id !== null)
			$this -> id = (int)$id;
	}

	public function getFirstName() {
		return $this -> first_name;
	}

	public function setFirstName($first_name) {
		$this -> first_name = $first_name;
	}

	public function getLastName() {
		return $this -> last_name;
	}

	public function setLastName($last_name) {
		$this -> last_name = $last_name;
	}

	public function getUserName() {
		return $this -> user_name;
	}

	public function setUserName($user_name) {
		if ($user_name === null)
			return;

		if (!preg_match('/^[a-z\d_.@]{2,20}$/i', $user_name))
			throw new \Exception('kullanıcı adı geçersiz');

		$this -> user_name = $user_name;
	}

	public function getPassword() {
		return $this -> password;
	}

	public function setPassword($password) {

		if ($password == null)
			return;

		if (strlen($password) < 6)
			throw new \Exception('Parola geçersiz');

		$this -> password = password_hash($password, PASSWORD_DEFAULT);
	}

	public function getCreateTime() {
		return $this -> create_time;
	}

	public function setCreateTime($create_time) {
		$this -> create_time = $create_time;
	}

}

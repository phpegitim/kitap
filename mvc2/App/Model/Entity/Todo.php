<?php

namespace App\Model\Entity;

class Todo{

	private $id;
	private $userId;
	private $task;
	private $completed;
	private $create_time;

	function __construct(int $id = null, int $userId = null, string $task = null, string $completed = null, string $create_time = null) {
		$this -> setId($id);
		$this -> setUserId($userId);
		$this -> setTask($task);
		$this -> setCompleted($completed);
		$this -> setCreateTime($create_time);
	}

	public function getId() {
		return (int)$this -> id;
	}

	public function setUserId($userId) {
		$this -> userId = (int)$userId;
	}
	
	public function getUserId() {
		return (int)$this -> userId;
	}

	public function setId($id) {
		$this -> id = $id;
	}	

	public function getTask() {
		return $this -> task;
	}

	public function setTask($task) {
		$this -> task = $task;
	}

	public function getCompleted() {
		return (int)$this -> completed;
	}

	public function setCompleted($completed) {
		$this -> completed = (int)$completed;
	}

	public function getCreateTime() {
		return $this -> create_time;
	}

	public function setCreateTime($create_time) {
		$this -> create_time = $create_time;
	}


}

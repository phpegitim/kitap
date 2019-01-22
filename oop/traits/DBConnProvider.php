<?php

class DBConnProvider{
	
	use SingletonTrait;
	
	private $conn;

	private $host = 'localhost';
	private $user = 'root';
	private $pass = '';
	private $dbName = 'performance_schema';
	private $driver = 'mysql';

	private function __construct() {
		$this -> conn = new PDO(
				"{$this->driver}:host={$this->host};dbname={$this->dbName}",
				$this -> user, 
				$this -> pass 
		);
	}

	public function getConnection(){
		return $this -> conn;
	}

	public function getDbName(){
		return $this->dbName;
	}
	
	public function getDriver(){
		return $this->driver;
	}	
	
	public function getUserName(){
		return $this->user;
	}	
	
}





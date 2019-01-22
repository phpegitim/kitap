<?php

class DBConnProvider{
	
	private static $instance = null;
	private $conn;

	private $host = 'localhost';
	private $user = 'root';
	private $pass = '';
	private $dbName = 'performance_schema';
	private $driver = 'mysql';

	private function __construct() {
		echo 'Kurucu çalıştı.<br>';
		$this -> conn = new PDO(
				"{$this->driver}:host={$this->host};dbname={$this->dbName}",
				$this -> user, 
				$this -> pass 
		);
	}
	
	public static function getInstance() {
		if (!self::$instance){
			self::$instance = new DBConnProvider();
			echo 'yeni DBConnProvider nesnesi türetildi.<br>';
		}else
			echo 'DBConnProvider nesnesi ram bellekten getirildi.<br>';
		
		return self::$instance;

	}

	public function getConnection(){
		return $this -> conn;
	}
	
	public function getServerInfo(){
		return $this->conn->getAttribute(PDO::ATTR_SERVER_INFO);
	}
	
	public function getDbName(){
		return $this->dbName;
	}
	
	public function getDriver(){
		return $this->driver;
	}	
	
	public function getUserName(){
		return substr($this->user, 0,2).'....';
	}	
	
	
	public function __clone() {
	    throw new Exception("Bu nesneyi klonlayamazsın.");
	}	
	
}



$dbConnProvider = DBConnProvider::getInstance();
$conn = $dbConnProvider->getConnection();
$conn->query();

var_dump($conn);

$dbConnProvider = DBConnProvider::getInstance();
$conn = $dbConnProvider->getConnection();
var_dump($conn);


$dbConnProvider = DBConnProvider::getInstance();
//$tryCloneInstance = clone $dbConnProvider;
$conn = $dbConnProvider->getConnection();
var_dump($conn);

echo 'Veritabanı sunucusu anlık durumu: '.$dbConnProvider->getServerInfo().'<br>';
echo 'Veritabanına '.$dbConnProvider->getUserName().' kullanıcısı ile bağlanıldı.<br>';
echo 'Veritabanı yazılımı : '.$dbConnProvider->getDriver().' <br>';





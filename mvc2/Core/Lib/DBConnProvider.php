<?php
namespace Core\Lib;

use Core\Pattern\SingletonTrait;
use App\Config;

class DBConnProvider {

	use SingletonTrait;

	private $conn;

	private function __construct() {
		$this -> setConnection(Config::getInstance());
	}

	protected function setConnection(Config $conf) {
		$dsn = $conf::DB_DRIVER . ':host=' . $conf::DB_HOST . ';dbname=' . $conf::DB_NAME;
		$this -> conn = new \PDO($dsn, $conf::DB_USER, $conf::DB_PASSWORD);
		$this -> conn -> setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
	}

	public function getConnection() {
		return $this -> conn;
	}

}

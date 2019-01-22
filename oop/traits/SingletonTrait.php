<?php
trait SingletonTrait {
	private static $instance;

	public static function getInstance() {
		if (!self::$instance) {
			echo 'Yeni nesne türetildi<br>';
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	public function __clone() {
	    throw new Exception("SingletonTrait, Bu nesneyi klonlayamazsın.");
	}		

}

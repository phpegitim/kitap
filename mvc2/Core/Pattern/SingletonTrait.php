<?php

namespace Core\Pattern;

trait SingletonTrait {
	private static $instance;

	public static function getInstance() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	public function __clone() {
	    throw new \Exception("SingletonTrait, Bu nesneyi klonlayamazsın.");
	}		
}

<?php

Class AutoLoader {
	
	static $incPath = __DIR__;
	
	static function init($name){
		
		$seperator = DIRECTORY_SEPARATOR;
		$name = strtr($name, '\\', $seperator);
		$file = self::$incPath . '/' . $name . '.php';
		if (is_readable($file)) {
			require $file;
			echo 'Gerekli olan, ' . $name . ' dosya yüklendi<br>';
		}		
		
		
	}
	
	

	static function autoloadClass($className) {
		
		if (self::checkIsTruePlace($className, 'Classes') === false)
			return false;

		$file = self::$incPath . '/' . $className . '.php';
		
		if (is_readable($file)) {
			require $file;
			echo 'Gerekli olan, ' . $className . ' sınıfının dosyası yüklendi<br>';
		}
	}

	static function autoloadInterface($interfaceName) {

		if (self::checkIsTruePlace($interfaceName, 'Interfaces') === false)
			return false;

		$file = self::$incPath . '/' . $interfaceName . '.php';
		if (is_readable($file)) {
			require $file;
			echo 'Gerekli olan, ' . $interfaceName . ' sınıfının dosyası yüklendi<br>';
		}
	}

	static function autoloadAbstract($abstactName) {

		if (self::checkIsTruePlace($abstactName, 'Abstracts') === false)
			return false;

		$file = self::$incPath . '/' . $abstactName . '.php';
		if (is_readable($file)) {
			require $file;
			echo 'Gerekli olan, ' . $abstactName . ' sınıfının dosyası yüklendi<br>';
		}
	}

	static function checkIsTruePlace($name, $needle) {
		var_dump($name);
		return strpos($name, $needle);
	}

}

spl_autoload_register('AutoLoader::init');
//spl_autoload_register('AutoLoader::autoloadAbstract');
//spl_autoload_register('AutoLoader::autoloadClass');

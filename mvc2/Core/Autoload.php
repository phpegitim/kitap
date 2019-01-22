<?php

Class AutoLoader {

	static function init($name) {
		$file = str_replace('\\', DIRECTORY_SEPARATOR, $name) . '.php';
		if (is_readable($file))
			require $file;
	}

}

spl_autoload_register('AutoLoader::init');
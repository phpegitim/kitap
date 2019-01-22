<?php 

function __autoload($name) {

	$file = __DIR__ . '/%s/%s.php';

	if (strpos($name, 'Class') !== false) {
		$file = sprintf($file, 'classes', $name);
		if (is_readable($file)){
			require $file;
			echo 'Gerekli olan, '.$name.' sınıfının dosyası yüklendi<br>';
		}
			
	}

	if (strpos($name, 'Interface') !== false) {
		$file = sprintf($file, 'interfaces', $name);
		if (is_readable($file)){
			require $file;
			echo 'Gerekli olan, '.$name.' arayüzünün dosyası yüklendi<br>';
		}
			
	}

	if (strpos($name, 'Abstract') !== false) {
		$file = sprintf($file, 'abstracts', $name);
		if (is_readable($file)){
			echo 'Gerekli olan, '.$name.' soyut sınıfın dosyası yüklendi<br>';
			require $file;
		}
			
	}

}
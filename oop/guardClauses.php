<?php

function fileRead($file) {

	if (file_exists($file)) {
		$handle = @fopen($file, 'r');

		if ($handle) {

			if (fwrite($handle, 'Deneme')) 
				return true;
			else 
				throw new Exception('Dosyaya yazılamadı', 3);
			

		} else
			throw new Exception('Dosya açılamadı', 2);
		

	} else
		throw new Exception('Dosya bulunamadı', 1);
	
}

function fileRead2($file) {

	if (!file_exists($file))
		throw new Exception('Dosya bulunamadı', 1);

	$handle = @fopen($file, 'r');

	if (!$handle)
		throw new Exception('Dosya açılamadı', 2);

	if (!fwrite($handle, 'Deneme'))
		throw new Exception('Dosyaya yazılamadı', 3);

	return true;
}

try{
	
	//fileRead('../log.txt');
	fileRead2('../log.txt');
	
}catch(Exception $e){
	echo $e->getMessage().' Line:'.$e->getLine();
}



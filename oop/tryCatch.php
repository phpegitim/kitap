<?php

$file = '../log.txt';

try {

	if (!file_exists($file))
		throw new Exception('Dosya bulunamadı', 1);

	$handle = @fopen($file, 'r');

	if (!$handle)
		throw new Exception('Dosya açılamadı', 2);

	if (!fwrite($handle, 'Deneme'))
		throw new Exception('Dosyaya yazılamadı', 3);

	echo '<h4>akış açıldı</h4>';

} catch(Exception $e) {
	echo '<h5>',
		'Hata Mesajı: ', $e->getMessage() ,'<br>', 
		'Hata Kodu: <b>' , $e->getCode() ,'</b><br>',
		'Dosya: ' , $e->getFile(),'<br>',
		'Satır: ' , $e->getLine(),
		'</h5>';

}finally{
	if(isset($handle) &&  is_resource($handle)){
		fclose ($handle);
		echo '<h4>akış kapatıldı</h4>';
	}
}

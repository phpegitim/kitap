<?php

//var_dump($_GET); 
//die(); 

require_once 'Core/Autoload.php';


try{
	$router = new Core\Router;
	$router -> dispatch($_GET['url']);
	
}catch(Exception|Error $e){
	
	if(App\Config::SHOW_ERRORS==true)
		echo 
			'Mesaj: <b>',$e->getMessage(),'</b><br>',
			'Dosya: ',$e->getFile(),'<br>',
			'Satır: ',$e->getLine(),'<br>';
	
}



<?php

//var_dump($_GET); 
//die(); 

require_once 'Core/Autoload.php';


try{
	$router = new Core\Router;
	$router -> dispatch($_GET['url']);
	
}catch(Exception|Error $e){
	switch ($e->getCode()) {
		case 1:
			header('Location: login');
			break;
		
		default:
			if(App\Config::SHOW_ERRORS==true)
				echo $e->getMessage();
			break;
	}
	
}



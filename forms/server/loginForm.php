<?php
session_start();
require_once 'RequestHandler/Interfaces/RequestHandler.php';
require_once 'RequestHandler/Helpers/DataFilterTrait.php';
require_once 'RequestHandler/RequestHandler.php';

use RequestHandler\RequestHandler;


try{

	$userName = RequestHandler::get('user_name','str');
	$pass = RequestHandler::get('pass','str');
	
	echo 'Selam ',$userName;
	
	
	
}catch(Exception $e){
	echo '<h3>Giriş Hatası</h3>';
	echo $e->getMessage();
}

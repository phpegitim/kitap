<?php 


session_start();

var_dump($_SESSION);

die();

require_once 'startSession.php';

if(!isset($_SESSION['user'])){
	include 'html/loginForm.html';
	exit;
}
	

echo 'Uygulamamıza Hoşgeldin ',$_SESSION['user'];

<?php

phpinfo();
die();

require_once 'startSession.php';

$dbUser = array('user_name' => 'mehmetali', 'pass_hash' => '$2y$10$PCFLckfFpxLcW7I4YfKE5OWAJRfdGVwB35cJYY4ClLx57SJvwyo4y');


$formPass = '4CUb6,=5';
$formUserName = 'mehmetali';


$verifyUserPass = password_verify($dbUser['pass_hash'], password_hash($formPass,PASSWORD_BCRYPT));

if($dbUser['user_name']==$formUserName && $verifyUserPass===true){
	die('aloha');
	session_regenerate_id();
	$_SESSION['user'] = array('user_name'=>$formUserName);
}

header('Location: application.php');	

	


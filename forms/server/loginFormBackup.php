<?php

if(empty($_POST)){
	header('Location: ../client/loginForm.html');
	exit;
}

var_dump($_POST);

if(!isset($_POST['user_name']) || !isset($_POST['pass']))
	die('gerekli parametreler eksik.');

echo 'Selam '.$_POST['user_name'];

filter_var('geçersiz bir email@example.c', FILTER_VALIDATE_EMAIL);

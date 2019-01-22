<?php

$numberOfAttempts = 0;
$pinNumber = 123;
$validatePinNumber = false;


$pinArr = [111,222,122];

do{
	echo  'Lütfen PIN giriniz.<br>';
	
	if($pinNumber==$pinArr[$numberOfAttempts]){
		$validatePinNumber = true;
		break;
	}
	
	echo  'Pin Hatalı<br><br>';
		
	$numberOfAttempts++;
	 
}while ($validatePinNumber==false && $numberOfAttempts < 3); 


if($validatePinNumber==true)
	echo 'Hoşgeldiniz';
else
	echo 'Kart kilitlendi';

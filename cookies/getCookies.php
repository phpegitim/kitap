<?php

if(!empty($_COOKIE))
	var_dump($_COOKIE);

if(isset($_COOKIE['productOffer'])){
	$prodOffCookie = unserialize($_COOKIE['productOffer']);
	var_dump($prodOffCookie);
}

setcookie('test2',null, -1);	
setcookie('product',null, -1);	
//setcookie('product[1]',null, -1);			
//setcookie('product[2]',null, -1);
//setcookie('product[3]',null, -1);

var_dump($_COOKIE);
		
	

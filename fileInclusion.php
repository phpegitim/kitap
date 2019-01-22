<?php

require_once 'oop/UserClass.php';

try{
	$userObj  = new UserClass();
	//$userObj -> setUserName('mehmet Ali');
	$userObj -> setPass('DikeyEksen2018');
	$userObj -> setFullName('Ali Uysal');
	
	/// burada artık veritabanı kaydı yapacak olan bir yapı kurabiliriz.
	
	$add2Db= 
		'<font size="5" color="green">Kullanıcı nesnesi başarıyla türetildi ve veri tabanına yazıldı.</font><hr>'.
		'Kullanıcı adı : '.$userObj->getUserName().'<br>'.
		'Kullanıcı parolası (md5) : '.$userObj->getPass().'<br>'.
		'Kullanıcı tam ismi : '.$userObj->getFullName().'<br>'
		;
		
	echo $msg;
		
}catch(Exception $e){
	echo 
		'<font size="5" color="red">Hata</font><hr>',
		'Kodu : ',$e->getCode(),'<br>',
		'Mesajı : <b>',$e->getMessage(),'</b><br>',
		'Alındığı Satır : ',$e->getLine(),'<br>',
		'Alındığı Yer : ',$e->getFile()
		;
}


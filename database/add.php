<?php

require_once 'dbConnect.php';

try {
	
	$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
	$sql = '
	INSERT INTO users 
	SET
		first_name 	= "Mehmet Ali",
		last_name 	= "UYSAL",
		user_name 	= "mehmetali@gmail.com",
		`password` 	= "'.password_hash('3213211',PASSWORD_DEFAULT).'"
	';	

	$conn -> exec($sql);
	echo '<br>kayıt oluşturuldu.';

} catch(PDOException $e) {
	echo '<br>',$e -> getMessage();
}

<?php

require_once 'dbConnect.php';

try {
	
	$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = '
	CREATE TABLE `test_users` (
		`id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
		`first_name`  varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
		`last_name`  varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
		`user_name`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
		`password`  varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
		`create_time`  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
		PRIMARY KEY (`id`)
	)
	';
	/*
	$sql = '
	INSERT INTO users 
	SET
		first_name 	= "Mehmet Ali",
		last_name 	= "UYSAL",
		user_name 	= "mehmetali@gmail.com",
		`password` 	= "'.password_hash('3213211',PASSWORD_DEFAULT).'"
	';	
	*/

	$conn -> exec($sql);
	echo '<br>tablo oluşturuldu.';

} catch(PDOException $e) {
	echo '<br>',$e -> getMessage();
}

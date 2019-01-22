<?php

require_once 'dbConnect.php';

try {

	$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = '
		UPDATE users
		SET 
			first_name = ?, 
			last_name = ?, 
			user_name = ?, 
			`password` = ?
		WHERE
			id = ?
	';
	$stmt = $conn -> prepare($sql);

	$userId = 1;
	$userNewData = ['Aybüke', 'UYSAL', 'aybuke', password_hash('3213211', PASSWORD_DEFAULT), $userId];
	$stmt -> execute($userNewData);
	
	echo '<br>kayıt güncellendi';
} catch(PDOException $e) {
	echo '<br>', $e -> getMessage();
}


/*
try {

	$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = '
		UPDATE users
		SET 
			first_name = :firstName, 
			last_name = :lastName, 
			user_name = :userName, 
			`password` = :pass
		WHERE
			id = :id
	';
	$stmt = $conn -> prepare($sql);

	$userId = 1;
	$userNewData = [
		'firstName'=>'Aybüke', 
		'lastName'=>'UYSAL', 
		'userName'=>'aybuke', 
		'pass'=>password_hash('3213211', PASSWORD_DEFAULT), 
		'id'=>$userId
	];
	$stmt -> execute($userNewData);
	
	echo '<br>kayıt güncellendi';
} catch(PDOException $e) {
	echo '<br>', $e -> getMessage();
}
*/
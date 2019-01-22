<?php

require_once 'dbConnect.php';

try {

	$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = '
		DELETE FROM users
		WHERE
			id = ?
	';
	$stmt = $conn -> prepare($sql);
	
	$userId = 1;
	$stmt -> execute([$userId]);
	
	$deletedRecNum = $stmt->rowCount();
	
	echo '<br>',$deletedRecNum,' kayıt silindi'; 
} catch(PDOException $e) {
	echo '<br>', $e -> getMessage();
}


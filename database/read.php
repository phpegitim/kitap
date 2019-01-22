<?php

require_once 'dbConnect.php';

try {

	$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = 'SELECT * FROM users WHERE id=?';
	$stmt = $conn -> prepare($sql);

	$userId = 1;
	$stmt -> execute([$userId]);
	
	/*	
	$userAssArr = $stmt -> fetch(\PDO::FETCH_ASSOC);
	var_dump($userAssArr);
	*/
	
	/*
	$userNumArr = $stmt -> fetch(\PDO::FETCH_NUM);
	var_dump($userNumArr);	
	*/
	
	/*
	$userObj = $stmt -> fetch(\PDO::FETCH_OBJ);
	var_dump($userObj);
	*/
	
	$userLazyObj = $stmt -> fetch(\PDO::FETCH_LAZY);
	var_dump($userLazyObj);	
	

} catch(PDOException $e) {
	echo '<br>', $e -> getMessage();
}

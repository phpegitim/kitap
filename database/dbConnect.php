<?php

try {
	$dsn = 'mysql:host=localhost;dbname=todo_list;charset=utf8';
	$conn = new PDO($dsn, 'root', '');
	echo 'Bağlantı başarılı';

} catch ( PDOException  $e ) {
	print $e -> getMessage();
}





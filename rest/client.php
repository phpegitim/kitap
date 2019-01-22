<?php 

$todo = file_get_contents('http://jsonplaceholder.typicode.com/todos/1');
if($todo!==false){
	$todoItemArr = json_decode($todo,1);
	var_dump($todoItemArr);
}else
	echo 'İşlem başarısız';	


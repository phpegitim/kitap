<?php
$handle = curl_init();

$url = 'http://jsonplaceholder.typicode.com/todos';
curl_setopt($handle, CURLOPT_URL, $url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

$output = curl_exec($handle);

curl_close($handle);

if ($output !== false) {
	$todoItemsArr = json_decode($output, 1);
	var_dump($todoItemsArr);
} else
	echo 'istek başarısız';

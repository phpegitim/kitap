<?php 

$handle = curl_init();

$url = 'http://www.google.com';

curl_setopt($handle, CURLOPT_URL, $url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
 
$output = curl_exec($handle);
 
curl_close($handle);
$ptn = '/<img(.*)id="hplogo"(.*)src="([^"]+)"/U';
$ptn2 = '/<img(.*) id="hplogo"/U';

preg_match($ptn, $output, $result);
$foo = array_pop($result);

var_dump($result);


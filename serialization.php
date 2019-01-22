<?php

$logArr = ['processName' => 'addRecord', 'recordId' => 12547, 'userId' => 26, 'dateTime' => date('Y-m-d H:i:s')];

$serLogStr = serialize($logArr);

var_dump($serLogStr);

$unSerLogArr = unserialize($serLogStr);

var_dump($unSerLogArr);


$file = 'log.txt';

$handle = fopen($file, 'a+');

fwrite($handle, $serLogStr . PHP_EOL);
fclose($handle);

$handle = fopen($file, 'r');
while ($line = fgets($handle))
		var_dump(unserialize($line));

fclose($handle);
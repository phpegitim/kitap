<?php

$tokenCreateTime = '2018-12-23 21:10:00';
$tokenValidPeriod = 30; // dakika 
$passedSec = time() - strtotime($tokenCreateTime);
$passedMin = floor($passedSec / 60);

if($passedMin>$tokenValidPeriod)
	die('token süresi sona erdi.');
	
echo 'token geçerli';

die();




setlocale(LC_ALL, 'tr_TR');
$time = mktime(0,0,0,10,29,1923);
echo $time,'<br>';
echo  'Cumhuriyet ',strftime('%A',$time),' günü ilan edildi';
die();


setlocale(LC_TIME,'tr_TR', 'tr', 'turkish');
$time = mktime(0,0,0,10,29,1923);
echo  'Cumhuriyet ',date('l',$time),' günü ilan edildi';
$timeArr = localtime($time);
var_dump($timeArr);

$timeArrAssoc = localtime($time,true);
var_dump($timeArrAssoc);

die();
setlocale('LC_ALL', 'turkish');

$time = mktime(0,0,0,10,29,1923);
echo $time,'<br>';
echo  'Cumhuriyet ',date('l',$time),' günü ilan edildi';

die();
$unixTime = -1457222400;
$date = date('d.m.Y',$unixTime);

echo $date; 


die();
echo var_dump(time());

die();
echo date('d.m.Y H:i:s'),'<br>';
echo date('H:i:s'),'<br>';
echo date('Y-m-d'),'<br>';
echo date('Y-m-d H:i:s'),'<br>';
echo date('h:i a'),'<br>';



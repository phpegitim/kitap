<?php

$var = 5 + "10 Küçük Kedicik";

var_dump($var);



die();
$var = 5 + "10 Küçük Kedi"; 
$var = 5 + "10 Minik Kedi";     



$null = (unset)10;

var_dump($null);


die();
ini_set('precision', 17);

$var = round((0.1 + 0.7) * 10, 2);

var_dump($var);

die();

$float = 1.15;
$float2 = 1.000000000000000000;

if ($float === $float2)
	echo 'iki değer eşit';
else
	echo 'iki değer eşit değil';

die();

$int = 2147483647;
$int++;
$int++;

$int2 = var_dump($int);
die();

$human = new stdClass;

var_dump($human);

$names = array();

var_dump($names);

$age = 32;

$str = <<<'EOT'
Mehmet Ali UYSAL, $age yaşındayım.
EOT;

echo $str;

//$bool = false;

//echo gettype($bool);

$int = 3;

echo gettype($int);

$float = (float)1.15;

echo gettype($float);

//$age = 32;

//$str = <<<'EOT'
//Mehmet Ali UYSAL, $age yaşındayım.
//EOT;

//echo $str;

$human = new stdClass;
//$human->name = 'mehmet ali';

var_dump($human);

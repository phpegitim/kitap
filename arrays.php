<?php

$fullNameStr = 'Albus Percival Wulfric Brian Dumbledore';

$nameArr = explode(' ', $fullNameStr);

$surNameStr = end($nameArr);

array_pop($nameArr);

$nameStr = implode(' ', $nameArr);

echo "Karakterin adı : $nameStr <br> Karakterin soyadı : $surNameStr";
	



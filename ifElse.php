<?php

$day = 'pazar';
$month = 'ocak';
$temperature = -5;

if ($month == 'aralık' || $month == 'ocak' || $month == 'şubat') {
	echo 'Kış aylarındayız. ';
	if ($day == 'pazar' && $temperature < 1)
		echo 'Hafta sonunda  araçla gezecek iseniz yollarda donma tehlikesi olabilir.';
	
}

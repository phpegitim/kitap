<?php
// süre tanımlamadan atanan bir çerez
setcookie('test', 'içerik');

// süre ile atanan bir çerez
setcookie('test2', 'içerik2', time()+3600);

// özel bir süre ile ve güvenlik önlemleri ile atanan bir çerez
$expiryTimeObj = new DateTime();
$expiryTime = $expiryTimeObj 
					-> add(new DateInterval('P1M')) 
					-> add(new DateInterval('P1D'))
					-> add(new DateInterval('PT1H')) 
					-> getTimestamp();
					
setcookie('test3', 'içerik3', $expiryTime, '/phpegitim/', 'localhost', false, true /* ,['samesite' => 'strict']*/);


setcookie('product[1]', 'ürün 1');
setcookie('product[2]', 'ürün 2');
setcookie('product[3]', 'ürün 3');


$productOff = ['name'=>'X mobile phone','price'=>'4999','offer_time'=>time()];
setcookie('productOffer', serialize($productOff), time()+1200);



var_dump($_COOKIE);
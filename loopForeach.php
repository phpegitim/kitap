<?php

$array = [0, 1, 2];
foreach ($array as &$val) 
    var_dump(current($array)).'<br>';



die();


$staffArr = array(
		array('Mehmet Ali',33,'Yazılım Geliştirici'),
		array('Alparslan',29,'Arayüz Geliştirici'),
		array('Pelin',24,'Grafik tasarımcı'),
		array('Kürşad',24,'Kullanıcı Deneyimi Tasarımcısı')
		
);

$rowNumber = 1;
foreach ($staffArr as $key => list($loopName,$loopAge,$loopPosition)) {
		
	echo $rowNumber.'<br>';
	echo 'Personel adı : '.$loopName.'<br>';
	echo 'Personel yaşı : '.$loopAge.'<br>';
	echo 'Personel mesleği : '.$loopPosition.'<br>';
	
	echo '<hr>';
	$rowNumber++;
}

var_dump($loopName); 


exit;

list($name,$age,$job) = ['Mehmet Ali','33','Yazılım Geliştirici'];

echo 'İsim: '.$name.'<br>';
echo 'Yaş: '.$age.'<br>';
echo 'Meslek: '.$job;

exit;

$movies =
		array(
			'lordOfTheRings'=>  
				array("Gandalf", "Aragorn", "Sauron", "Frodo", "Legolas"),
			'matrix'=>
				array("Neo", "Morpheus", "Trinity", "Cypher", "Tank")
		);
		
foreach ($movies as $key =>  $value){
		
	echo $key;
	
	echo '<hr>';
	
	foreach ($value as $subKey => $subValue) {
		echo $subValue;
		echo '<br>';
	}
	
	echo '<br>';
}





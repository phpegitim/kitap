<?php

require_once 'AnimalsClass.php';
require_once 'MammalsClass.php';
require_once 'DogClass.php';

try{
	$aDog = new DogClass();
	$aDog -> makeNoise();
	$aDog -> sleep();
	echo 'Köpekler '.$aDog->getFamily(). ' familyasındandır. '.$aDog->getFamily().' familyası '.$aDog->getReproduction().' ile ürer.<br>';
	echo 'Benim adım: ',$aDog->getName();
	var_dump($aDog);	
}catch(Exception $e){
	echo $e->getMessage();
}





die();




require_once 'AnimalsClass.php';
require_once 'MammalsClass.php';

$aMammal = new MammalsClass();
$aMammal -> makeNoise();
$aMammal -> sleep();
echo 'Memelilerin üreme yöntemi; '.$aMammal->getReproduction(). ' dur.';

var_dump($aMammal);

die();



require_once 'AnimalsClass.php';

try {
	$anAnimal = new AnimalsClass('memeli');
	$anAnimal -> makeNoise();
	$anAnimal -> sleep();
	var_dump($anAnimal);
} catch(Exception $e) {
	echo $e -> getMessage();
}

die();

require_once 'NonMammalsClass.php';
require_once 'MammalsClass.php';
require_once 'DogClass.php';
require_once 'BirdClass.php';

$dog = new DogClass('Duman');

echo '<h3>Genel bilgi</h3>';
echo 'Köpek ', $dog -> getName(), ', ', 'bir ', $dog -> getFamily(), ' dir.  ', $dog -> getFamily(), ' bir hayvan', ' sadece ', $dog -> getGiveBirth(), ' yapar.<br>';

echo '<h4>Davranışlar</h4>';
$dog -> sleep();
$dog -> makeNoise();

var_dump($dog);

echo '<hr>';

$bird = new BirdClass('tweety');

echo '<h3>Genel bilgi</h3>';
echo 'Kuş ', $bird -> getName(), ', ', 'bir ', $bird -> getFamily(), ' dir.  ', $bird -> getFamily(), ' bir hayvan', ' sadece ', $bird -> getGiveBirth(), ' yapar.<br>';

echo '<h4>Davranışlar</h4>';

$bird -> sleep();
$bird -> makeNoise();
$bird -> fly();

var_dump($bird);

var_dump(get_class_methods($bird));

echo '<hr>';

try {
	$anAnimal = new AnimalsClass('sürüngen');

} catch(Exception $e) {
	echo '<h3>Hata</h3>';
	echo $e -> getMessage();
}

<?php

require_once 'AbstractVehicle.php';
require_once 'MotorcycleClass.php';
require_once 'HelmetClass.php';

try {

	$motorCycleDucati = new MotorcycleClass();
	$motorCycleDucati -> setName('Ducati');
	$motorCycleDucati -> setFuelUsage(4);
	$motorCycleDucati -> setFuelRemaining(20);

	$helmet = new HelmetCLass();
	$helmet->setType('shortDistance');
	
	$motorCycleDucati -> setHelmet($helmet);
	
	
	$motorCycleDucati->setHelmetStatus(true);
	
	
	$motorCycleDucati -> run(300);
	var_dump($motorCycleDucati);

} catch(Exception $e) {
	echo '<h2>İstisnalar</h2>';
	echo $e -> getMessage() . '<br>';
} catch (Error $e) {
	echo '<h2>Hatalar</h2>';
	echo $e -> getMessage();
}finally{
	echo '<h2>Son olarak...</h2>';
	if($motorCycleDucati->getStatus()==true)
		$motorCycleDucati->stop();
}



die();



require_once 'AbstractVehicle.php';
require_once 'CarClass.php';

try {

	$carAudi = new CarClass();
	$carAudi -> setName('Audi A4');
	$carAudi -> setFuelUsage(6.4);
	$carAudi -> setFuelRemaining(20);
	$carAudi -> setSafetyBeltStatus(true);
	$carAudi -> run(200);
	var_dump($carAudi);

} catch(Exception $e) {
	echo '<h2>İstisnalar</h2>';
	echo $e -> getMessage() . '<br>';
} catch (Error $e) {
	echo '<h2>Hatalar</h2>';
	echo $e -> getMessage();
}finally{
	echo '<h2>Son olarak...</h2>';
	if($carAudi->getStatus()==true)
		$carAudi->stop();
}

die();



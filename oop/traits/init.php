<?php



require_once '../inheritance/AnimalsClass.php';
require_once '../inheritance/MammalsClass.php';
require_once 'FlyableTrait.php';
require_once 'SoarableTrait.php';
require_once 'WingClass.php';

require_once 'HorseClass.php';
require_once 'PegasusClass.php';




try {

	$pegasus = new PegasusClass();

	$pegasus -> setWing('left', new WingClass(100));
	$pegasus -> setWing('right', new WingClass(100));
	
	$pegasus -> fly();
	$pegasus -> soar();

	echo '<h3>Nesne yapısı</h3>';
	var_dump($pegasus);

} catch(Exception $e) {
	echo '<h3>İstisnalar</h3>';
	echo $e -> getMessage();
}

die();
require_once 'SingletonTrait.php';
require_once 'DBConnProvider.php';

$dbConnProvider = DBConnProvider::getInstance();
$conn = $dbConnProvider->getConnection();
var_dump($conn);

$dbConnProvider = DBConnProvider::getInstance();
$conn = $dbConnProvider->getConnection();
var_dump($conn);


$dbConnProvider = DBConnProvider::getInstance();
$tryCloneInstance = clone $dbConnProvider;
$conn = $dbConnProvider->getConnection();
var_dump($conn);


die();
<?php
require_once 'AnimalInterface.php';
require_once 'BirdInterface.php';
require_once 'FlyableInterface.php';

require_once 'FalconClass.php';
require_once 'ChickenClass.php';

echo '<h3>Chicken (Tavuk)</h3>';

$chicken = new ChickenClass();
$chicken -> eat('tohum');
$chicken -> flap();
$chicken -> reProduce();

echo '<h3>-----</h3>';


echo '<h3>Falcon (Şahin)</h3>';

$falcon = new FalconClass();

$falcon -> eat($chicken);

$falcon -> flap();
$falcon -> fly();
$falcon -> reProduce();

echo '<h3>-----</h3>';
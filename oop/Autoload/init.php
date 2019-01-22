<?php
namespace Classes;

require_once 'autoload.php';

$staff = new Staff();
$staff -> setUserName('ahmet.saracoglu');
$staff -> setName('Ahmet');
$staff -> setPass('bAr}oS_sa');
$staff -> setPosition('E-Commerce Consultant');

var_dump($staff);

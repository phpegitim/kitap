<?php


echo 'Benim adım ' .$_ENV["USER"] . '!';

$name = 'Mehmet Ali';       
$friendName = &$name;   

$friendName = 'Ömer';

echo $name;



die();
           
$bar = "My name is $bar";  // Alter $bar...

echo $bar;
echo $foo;                 // $foo is altered too.
?>
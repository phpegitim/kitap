<?php


echo 'Benim adım ' .$_ENV["USER"] . '!';

$name = 'Mehmet Ali';       
$friendName = &$name;   

$friendName = 'Ömer';

echo $name;

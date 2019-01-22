<?php

$matrix = ["Neo", "Morpheus", "Trinity", "Cypher", "Tank"];

$matrixArrSize = count($matrix);

for ($i = 0; $i < $matrixArrSize; $i++){
		
	if($i == 3)
		continue;
	
	echo $matrix[$i] . '<br>';
	
}
	




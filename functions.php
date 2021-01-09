<?php

$persons = array(
  ['name' => 'Merve', 'age' => 26, 'experienceYear'=>3, 'englishLevel'=>1],
  ['name' => 'Hakan', 'age' => 34, 'experienceYear'=>4, 'englishLevel'=>2],
  ['name' => 'Zehra', 'age' => 30, 'experienceYear'=>7, 'englishLevel'=>3],
  ['name' => 'Erkan', 'age' => 34, 'experienceYear'=>4, 'englishLevel'=>1],
  ['name' => 'Pelin', 'age' => 27, 'experienceYear'=>3, 'englishLevel'=>1]
);


$sortByCustomFilter = function($personA,$personB){
	
	if ($personA['experienceYear'] == $personB['experienceYear']){
	
		if($personA['englishLevel']!=$personB['englishLevel'])
			return $personA['englishLevel'] < $personB['englishLevel'] ? 1 : -1;
		else{
			if($personA['age'] != $personB['age'])
				return $personA['age'] < $personB['age'] ? 1 : -1;
			else
				return 0;
		}
	
	}
	
	return $personA['experienceYear'] < $personB['experienceYear'] ? 1 : -1;
	
};

usort($persons, $sortByCustomFilter);

var_dump($persons);
die();




die();


function getRange ($max) {
    $array = [];

    for ($i = 1; $i < $max; $i++) 
        $array[] =  $i;

    return $array;
}


$numbers = getRange(100000);

echo  (memory_get_usage() / 1048576). ' MB';

echo '<br>';

function getRange2 ($max) {
    for ($i = 1; $i < $max; $i++) 
        yield $iW;
}

$numbers = getRange2(100000);

echo  (memory_get_usage() / 1048576). ' MB';

die();


function getValue() {
    yield 'Dikey Eksen';
}

function getAccount() {
    yield 'name'=>'Mehmet Ali';
	yield 'lastName'=>'Uysal';
}


function getAccounts() {
    yield ['name'=>'Mehmet Ali','lastName'=>'Uysal'];
	yield ['name'=>'Murat','lastName'=>'Yıldız'];
	yield ['name'=>'Pelin','lastName'=>'Goksu'];
	yield ['name'=>'Merve','lastName'=>'Aksakal'];
}


function getAccounts2() {
    return array( ['name'=>'Mehmet Ali','lastName'=>'Uysal'],
	 ['name'=>'Murat','lastName'=>'Yıldız'],
	['name'=>'Pelin','lastName'=>'Goksu'],
	['name'=>'Merve','lastName'=>'Aksakal']);
}


$version = getValue();
var_dump($version);

foreach ($version as $key => $value) 
	echo $key.' : '.$value.' <br>';


$account = getAccount();
var_dump($account);

foreach ($account as $key => $value) 
	echo $key.' : '.$value.' <br>';

$account = getAccounts();
var_dump($account);

foreach ($account as $key => $value) 
	echo $value['name'].' '.$value['lastName'].'<br>';


die();

$categories = 
	array(
		array('id'=>1, 'parent_id'=>0, 'name'=>'Yazılım Geliştirme'),
		array('id'=>2, 'parent_id'=>1, 'name'=>'Masaüstü Yazılım Geliştirme'),
		array('id'=>3, 'parent_id'=>1, 'name'=>'Mobil Uygulama Geliştirme'),
		array('id'=>4, 'parent_id'=>1, 'name'=>'Web Uygulama Geliştirme'),
		array('id'=>5, 'parent_id'=>4, 'name'=>'PHP'),
		array('id'=>6, 'parent_id'=>2, 'name'=>'C++'),
		array('id'=>7, 'parent_id'=>4, 'name'=>'Python'),
		array('id'=>8, 'parent_id'=>2, 'name'=>'Java SE'),
		array('id'=>9, 'parent_id'=>2, 'name'=>'C#'),
		array('id'=>10, 'parent_id'=>3, 'name'=>'Swift'),
		array('id'=>12, 'parent_id'=>3, 'name'=>'Java Android'),		
				
	);


function buildTree($array, $parentId = 0) {


	
    $tree = array();

    foreach ($array as $element) {
 
        if ($element['parent_id'] == $parentId) {
            $children = buildTree($array, $element['id']);
           
            if (!empty($children)){ 
                $element['children'] = $children;
				
			}
            
            $tree[] = $element;
			
        }
    }
	

    return $tree;
}

$tree = buildTree($categories);

ini_set('xdebug.var_display_max_depth', '5');
var_dump($tree[0]);
die();

function math() {

	function sum($a, $b) {
		return $a + $b;
	}

	function sub($a, $b) {
		return $a - $b;
	}

	function div($a, $b) {
		return $a / $b;
	}

	function multi($a, $b) {
		return $a * $b;
	}

	function mod($a, $b) {
		return $a % $b;
	}

	echo 'Matematik fonksiyonları tanımlandı, kullanıma hazır.';

}

math();

var_dump(sum(3, 2));
var_dump(sub(3, 2));
var_dump(div(3, 2));
var_dump(multi(3, 2));
var_dump(mod(3, 2));

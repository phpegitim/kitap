<?php
class Person {
	private $name;
	private $age;

	function __construct() {
	}

	public function setAge($age) {
		
		if (!is_int($age)) 
			throw new Exception("Cannot assign non integer value to integer field, 'Age'");

		$this -> age = $age;
	}
	
	public function setName($name) {
		if (strlen($name)<2) 
			throw new Exception("Geçerli bir isim tanımlamadınız.");

		$this -> age = $age;
	}	

	public function yearsToRetire() {
		return 67 - $this -> age;
	}

}

try {
		
	$person = new Person("Wes");
	$person -> setAge(31);

	echo $person -> yearsToRetire();

} catch(Exception $e) {
	echo $e->getMessage();
}

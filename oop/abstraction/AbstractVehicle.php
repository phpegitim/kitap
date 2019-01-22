<?php

abstract class AbstractVehicle {

	private $name;
	private $status = false;
	private $fuelUsage;
	private $fuelRemaining = 0.0;

	abstract public function run(int $distance);
	

	public function start() {
		
		if ($this -> getStatus() == true)
			throw new InvalidArgumentException("Araç zaten çalışıyor.");		
		
		if ($this -> getFuelRemaining() < 1)
			throw new InvalidArgumentException('Depo Boş. Araç çalıştırılamaz');
		
		$this-> setStatus(true);
		
		echo $this->getName().' çalıştırıldı.<br>';
	}

	public function stop() {

		if ($this -> getStatus() == false)
			throw new InvalidArgumentException("Araç zaten çalışmıyor.");

		$this -> setStatus(false);
		echo $this->getName().' stop edildi.<br>';

	}
	
	public function testVehicleRequirements2Run(int $distance){

		if($this->getStatus()==false)
			throw new InvalidArgumentException('Lütfen önce aracı çalıştırın');

		$getFuelUsage = $this -> getFuelUsage();
		if ($getFuelUsage == null)
			throw new InvalidArgumentException('100km de ne kadar yakıt harcadığımı bilmediğim için, bu yolu gidebilir miyim bilmiyorum.');
		
		$getRemFuel = $this -> getFuelRemaining();

		$calcMaxDistance = ($getRemFuel / $getFuelUsage) * 100;
		if ($distance > $calcMaxDistance)
			throw new RangeException($distance . ' km mesafeyi gidemem. En fazla gidebileceğim mesafe ' . $calcMaxDistance . ' km');
		
		return true;		
	}	
	
	
	public function setName(string $name) {
		$this -> name = $name;
	}

	public function getName() {
		return $this -> name;
	}

	public function setFuelUsage(float $fuelUsage) {
		$this -> fuelUsage = $fuelUsage;
	}

	public function getFuelUsage() {
		return $this -> fuelUsage;
	}

	public function setFuelRemaining(float $fuelRemaining) {
		$this -> fuelRemaining = $fuelRemaining;
	}

	public function getFuelRemaining() {
		return $this -> fuelRemaining;
	}

	public function setStatus(bool $status) {
		$this -> status = $status;
	}

	public function getStatus() {
		return $this -> status;
	}

}

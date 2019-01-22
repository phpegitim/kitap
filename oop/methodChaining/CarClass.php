<?php
class CarClass {

	private $tank;

	public function fill(float $fuel) {
		$this -> tank += $fuel;
		return $this;
	}

	public function ride(int $distance) {
		$fuelUsage = (float)$distance / 20;
		$this -> tank -= ($fuelUsage);
		return $this;
	}

	public function getFuelRemaining() {
		return $this -> tank;
	}

}

$audi = new CarClass();

$chainOperation = $audi -> fill(45) -> ride(100) -> getFuelRemaining();

echo 'Kalan yakıt ',$chainOperation,' litre';

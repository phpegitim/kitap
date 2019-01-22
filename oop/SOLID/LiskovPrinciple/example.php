<?php

class Vehicle {

	function startEngine() {
		// tüm araçlarda genel motoru başlata işlemi
	}

	function accelerate() {
		// tüm araçlarda genel hızlanma işlemi
	}

}


class Car extends Vehicle {
 
    function startEngine() {
        $this->engageIgnition();
        parent::startEngine();
    }
 
    private function engageIgnition() {
        // ateşleme başltılıyor.(yanmalı motor)
    }
 
}
 
class ElectricBus extends Vehicle {
 
    function accelerate() {
        $this->increaseVoltage();
        $this->connectIndividualEngines();
    }
 
    private function increaseVoltage() {
        // elektrikli araç olduğu için, voltaj yükleltliyor.
    }
 
    private function connectIndividualEngines() {
        // diğer elektronik iletişimler yapılıyor. (diğer hybrit motorlar vs.)
    }
 
}

class Driver {
    function go(Vehicle $v) {
        $v->startEngine();
        $v->accelerate();
    }
}

$driver = new Driver();
$driver->go(new Vehicle);

$driver2 = new Driver();
$driver2->go(new ElectricBus);




